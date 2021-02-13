<?php

require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';
require_once '../config/blade.php';

/** @var $blade */
$category = null;
if ($_GET && isset($_GET['id'])) {
    $id = trim($_GET['id']);
    $category=\App\Model\Category::find($id);
}
echo $blade->make('pages/add-new-category',compact('category'))->render();
