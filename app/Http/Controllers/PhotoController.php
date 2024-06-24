<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Log;
use App\Models\Post;

class PhotoController extends Controller
{

    public function edit(Photo $photo)
    {

        return view('posts.edit', ['photo'=>$photo]);
    }


    public function store(Request $request)
    {
        // Assicurati di ottenere correttamente l'ID del post dal form
        $postId = $request->input('post_id');

        // Recupera il post utilizzando l'ID ottenuto dal form
        $post = Post::findOrFail($postId);

        $request->validate([
            'photos.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp'], // Accetta solo immagini di determinati formati
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $image) {
                // Salva il nuovo file
                $path = $image->store('photos', 'public');

                // Associa l'immagine al post utilizzando la relazione molti a molti
                $post->photos()->create(['path' => $path]);
            }
        }
        Log::info('Immagine inserita nel database');
        return redirect()->back()->with('success', 'Foto aggiunte con successo!');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'photos.*' => ['nullable', File::types('webp', 'jpg', 'png', 'jpeg')],
    //     ]);

    //     if($request->hasFile('photos')){
    //         foreach($request->file('photos') as $image){

    //             $path= $image->store('photos', 'public');

    //             Photo::create([
    //                 'path' => $path,

    //             ]);
    //         }
    //     }
    //     $latestPhoto = Photo::latest()->first(); // Ottieni l'ultima foto caricata
    //     $post = $latestPhoto->post;

    //     return redirect()->route('posts.edit', $post)->with('success', 'Foto aggiornate con successo!');
    // }


    // public function update(Request $request, Photo $photo)
    // {
    //     $request->validate([
    //         'photos.*' => ['nullable', 'image', File::types('webp', 'jpg', 'png', 'jpeg')],
    //     ]);

    //     if ($request->hasFile('photos')) {
    //         foreach ($request->file('photos') as $image) {


    //             // Salva il nuovo file
    //             $path = $image->store('photos', 'public');

    //             // Aggiorna il percorso della foto nel database
    //             $photo->path = $path;
    //             $photo->save(); // Salva le modifiche nel database
    //         }
    //     }

    //     return redirect()->route('posts.edit', $photo->post)->with('success', 'Foto aggiornate con successo!');
    // }

    public function destroy(Photo $photo)
    {
        Storage::disk('public')->delete($photo->path);

        // Rimuovi il record dal database
        $photo->delete();

        // Redirect alla pagina di modifica del post associato
        return redirect()->back()->with('success', 'Foto eliminata con successo!');
    }
}
