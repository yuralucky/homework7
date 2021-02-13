<?php
require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';
require_once '../config/blade.php';

/** @var $blade */
$tag = null;
if ($_GET && isset($_GET['id'])) {
    $id = intval(trim($_GET['id']));
    $category=\App\Model\Category::find($id);
    $category->delete();
}
$categories=\App\Model\Category::all();
echo $blade->make('pages/list-categories',compact('categories'))->render();