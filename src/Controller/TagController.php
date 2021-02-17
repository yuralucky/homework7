<?php


namespace App\Controller;

use App\Model\Tag;
use Illuminate\Http\RedirectResponse;

class TagController
{
    public function index()
    {
        $tags = Tag::all();
        return view('tag/index', compact('tags'));
    }

    public function create()
    {
        $tag = new Tag();
        return view('tag/form', compact('tag'));
    }

    public function store()
    {
        $tags = new Tag();
        $data = request()->all();
        var_dump($data);
        $tags->title = $data['title'];
        $tags->slug = $data['slug'];
        $tags->save();
        return new RedirectResponse('/tag');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tag/form', compact('tag'));
    }

    public function update($id)
    {
        $tag = Tag::find($id);
        $data = request()->all();
        $tag->title = $data['title'];
        $tag->slug = $data['slug'];
        $tag->update();
        return new RedirectResponse('tag');

    }

    public function destroy($id)
    {
        $tag=Tag::find($id);
        $tag->delete();
        return new RedirectResponse('/tag');
    }
}