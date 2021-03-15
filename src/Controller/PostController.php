<?php


namespace App\Controller;


use App\Model\Post;
use App\Model\Tag;
use Illuminate\Http\RedirectResponse;

class PostController
{
    public function index()
    {
        $posts = Post::all();
        return view('post/index', compact('posts'));
    }

    public function create()
    {
        $post = new Post();
        return view('post/add-post', compact('post'));
    }

    public function store()
    {
        $tags = new post();
        $data = request()->all();
        $tags->title = $data['title'];
        $tags->body = $data['body'];
        $tags->save();
        return new RedirectResponse('/posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('post/update-post', compact('post'));
    }

    public function update($id)
    {
        $post = Post::find($id);
        $data = request()->all();
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->update();
        return new RedirectResponse('/post');

    }

    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return new RedirectResponse('/post');
    }
}