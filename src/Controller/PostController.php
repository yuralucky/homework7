<?php


namespace App\Controller;


use App\Model\Post;
use App\Model\Tag;
use Illuminate\Http\RedirectResponse;

class PostController
{
    public function index()
    {
        $posts = Post::paginate(3);
        return view('post/index', compact('posts'));
    }

    public function create()
    {
        $post = new Post();
        return view('post/add-post', compact('post'));
    }

    public function store()
    {
        $post = new Post();
        $data = request()->all();
        $validator = validator()->make($data, [
            'title' => ['required'],
            'body' => ['required', 'min:5']
        ]);

        if (count($error = $validator->errors())>0) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->user_id=1;
        $post->category_id=1;
        $post->save();
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
        $validator = validator()->make($data, [
            'title' => ['required'],
            'body' => ['required', 'min:5']
        ]);

        if (count($error = $validator->errors())>0) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }
        $data = request()->all();
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->update();
        return new RedirectResponse('/posts');

    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return new RedirectResponse('/posts');
    }
}