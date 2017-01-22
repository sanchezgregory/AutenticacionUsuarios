<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title', 'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function submit(array $data)
    {
        $post = new Post($data);
        if (empty($post->slug)) {
            $post->slug = Str::slug($post->title);
        }
        $post->user_id = auth()->user()->id;
        $post->save();

        return $post;
    }
}
