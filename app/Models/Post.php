<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\User;
use App\Models\Photo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'salary', 'description','featured'];

    public function tag(string $name){
        $tag = Tag::firstOrCreate(['name'=> $name]);

        $this->tags()->attach($tag);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function photos(){
        return $this->belongsToMany(Photo::class);
    }
}
