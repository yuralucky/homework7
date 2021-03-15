<?php


namespace App\Controller;

use App\Model\Category;
use Illuminate\Http\RedirectResponse;

class CategoryController
{
    public function index()
    {
        $categories = Category::all();
        return view('category/index', compact('categories'));
    }

    public function create()
    {
        $category = new Category();
        return view('category/add-category', compact('category'));
    }

    public function store()
    {
        $category = new Category();
        $data = request()->all();
        var_dump($data);
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->save();
        return new RedirectResponse('/category');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category/update-category', compact('category'));
    }

    public function update($id)
    {
        $category = Category::find($id);
        $data = request()->all();
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->update();
        return new RedirectResponse('/category');

    }

    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return new RedirectResponse('/category');
    }
}