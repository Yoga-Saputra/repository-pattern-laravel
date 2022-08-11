<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    protected $post;

    public function __construct(Post $post) {
        $this->post = $post;
    }

    public function getAllPostRepository()
    {
        $post = $this->post->get()
            ->map(function ($post){
                return $this->format($post);
            });

        return $post;
    }

    public function savePostRepository($data)
    {
        $post = new Post();
        $post->title = $data['title'];
        $post->description = $data['description'];

        $post->save();

        return $post->fresh();
    }

    protected function format($contact)
    {
        return [
            'post_id' => $contact->id,
            'title' => $contact->title,
            'description' => $contact->description,
        ];
    }
}
