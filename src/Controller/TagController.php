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
        return view('tag/add-tag', compact('tag'));
    }

    public function store()
    {
        $tags = new Tag();
        $data = request()->all();
        $validator = validator()->make($data, [
            'title' => ['required'],
            'slug' => ['required', 'min:5']
        ]);
        if (count($error = $validator->errors())>0) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }
        $tags->title = $data['title'];
        $tags->slug = $data['slug'];
        $tags->save();
        return new RedirectResponse('/tag');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tag/update-tag', compact('tag'));
    }

    public function update($id)
    {
        $tag = Tag::find($id);
        $data = request()->all();
        $validator = validator()->make([
            'title'=>'required,min:5'
        ]);
        dd($validator);
        $tag->title = $data['title'];
        $tag->slug = $data['slug'];
        $tag->update();
        return new RedirectResponse('/tag');

    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return new RedirectResponse('/tag');
    }
}