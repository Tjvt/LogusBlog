<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    function id()
    {

    }

    function created_at()
    {

    }

    function updated_at()
    {

    }

    function body($id): string
    {
        $post = Posts::find($id); // Sucht den Post nach ID

        if ($post) {
            return $post->body; // Gibt das Feld "body" aus der DB zurück
        }

        return 'Post nicht gefunden';
    }
}
