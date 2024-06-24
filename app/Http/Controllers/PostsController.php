<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Models\Post;
use Illuminate\Validation\Rules\File;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use App\Models\Tag;



class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $featuredPosts = Post::where('featured', 1)->with('user')->inRandomOrder()->take(4)->get();
        $nonFeaturedPosts = Post::where('featured', 0)->with('user')->inRandomOrder()->take(6)->get();
        $tags = Tag::take(8)->get();

        return view('posts.index', [
            'featuredPosts' => $featuredPosts,
            'posts' => $nonFeaturedPosts,
            'tags'=>$tags,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/posts.create');
    }

    public function show(User $user)
    {
        $posts = $user->posts()->with('photos')->latest()->get();

        // foreach ($posts as $post) {
        //     $photoCount = $post->photos->count();
        //     Log::info("Post ID: {$post->id} ha {$photoCount} foto.");
        // }

        return view('posts.show', compact('user', 'posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'salary' => ['required'],
            'description' => ['required', 'max:300'],
            'tags'=>['required','string']
        ]);

        $img = $request->validate([
            'images.*'=>['nullable', 'file', 'mimes:png,jpeg,jpg,webp'],
        ]);

        $attributes['featured'] = $request->has('featured');



        $post = new Post($attributes);
        $post->user_id = Auth::id();
        $post->save();

        $tagsInput = $attributes['tags'];
        $tags = [];

        // Controlla e parsa la stringa dei tag
        if (strpos($tagsInput, ', ') !== false) {
            // Caso con spazio dopo la virgola
            $tags = explode(', ', $tagsInput);
        } else if (strpos($tagsInput, ',') !== false) {
            // Caso senza spazio dopo la virgola
            $tags = explode(',', $tagsInput);
        }

        Log::info('Tag inseriti: ' . json_encode($tags));

        // Associa i tag al post
        foreach ($tags as $tagName) {
            // Rimuovi eventuali spazi bianchi
            $tagName = trim($tagName);

            // Trova o crea il tag
            $tag = Tag::firstOrCreate(['name' => $tagName]);

            // Associa il tag al post
            $post->tags()->attach($tag->id);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imgPath = $image->store('photos');
                $photo = new Photo(['path' => $imgPath]);
                $photo->save();
                $post->photos()->attach($photo->id);
            }
        } else {
            $defaultImagePath = 'images/cocktailDefault.png';
            if (Storage::disk('public')->exists($defaultImagePath)) {
                $photo = new Photo(['path' => $defaultImagePath]);
                $photo->save();
                $post->photos()->attach($photo->id);
            } else {
                Log::error('Immagine di default non trovata: ' . $defaultImagePath);
            }
        }


        return redirect('/');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // $this->authorize('delete', $post);


        $post->delete();

        // Reindirizza alla pagina desiderata dopo l'eliminazione del post
        return redirect()->route('users.show', Auth::user());
    }
}
