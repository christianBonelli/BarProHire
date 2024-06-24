<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
USE App\Models\Tag;

class SinglePostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $user->load('posts.photos');


        return view('cViews.socialPage', [
            'user' => $user,
            'posts' => $user->posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);
        $post->load('photos');

        return view('cViews.singlePost', ['singlePost'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $newData = $request->validate([
            'salary'=>['string'],
            'description'=>['string', 'max:300'],
            'tags'=>['string']
        ]);

        $post->salary = $request->salary;
        $post->description = $request->description;
        $post->save();

        $tags = $newData['tags'];

        if (strpos($tags, ', ') !== false) {
            $tags = explode(', ', $tags);
        } else {
            $tags = explode(',', $tags);
        }

        $tags = array_map('trim', $tags);

        if (count($tags) > 3) {
            return redirect()->back()->withErrors(['tags' => 'Non puoi inserire più di 3 tag.'])->withInput();
        }

        // Associazione dei tag con il post
        $tagIds = [];
        foreach ($tags as $tagName) {
            // Cerca il tag per nome
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            // Aggiungi l'id del tag all'array dei tagIds
            $tagIds[] = $tag->id;
        }

        // Aggiorna i tag associati al post usando il metodo sync
        $post->tags()->sync($tagIds);

        return redirect()->route('posts.edit', $post)->with('success', 'Post updated successfully!');
    }


}
