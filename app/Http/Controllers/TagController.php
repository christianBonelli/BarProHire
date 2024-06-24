<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __invoke(Tag $tag){
        return view('posts.result', [
            'tag'=>$tag,
            'posts'=>$tag->posts]);
    }
}
