<?php

use App\Model\Category;

require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';
require_once '../config/blade.php';

/** @var $blade */
if ($_POST && isset($_POST['title']) || isset($_POST['slug'])) {
    if(isset($_POST['id'])&& intval($_POST['id'])){
        $category=Category::find(trim($_POST['id']));
        $category->title = trim($_POST['title']);
        $category->slug = trim($_POST['slug']);
        $category->update();
    }
    else{
        $category = new Category();
        $category->title = trim($_POST['title']);
        $category->slug = trim($_POST['slug']);
        $category->save();
    }

}
$categories = Category::all();
echo $blade->make('pages/list-categories', compact('categories'))->render();
