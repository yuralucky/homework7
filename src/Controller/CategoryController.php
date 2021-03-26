<?php


namespace App\Controller;

use App\Model\Category;
use Illuminate\Http\RedirectResponse;

class CategoryController
{
    public function index()
    {
        $categories = Category::paginate(5);
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
        $validator = validator()->make($data, [
            'title' => ['required'],
            'slug' => ['required', 'min:5']
        ]);
        if (count($error = $validator->errors())>0) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->save();
        return new RedirectResponse('/categories');
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
        $validator = validator()->make($data, [
            'title' => ['required'],
            'slug' => ['required', 'min:5']
        ]);
        if (count($error = $validator->errors())>0) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->update();
        return new RedirectResponse('/categories');

    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return new RedirectResponse('/categories');
    }
}