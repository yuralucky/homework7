<?php

require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';
require_once '../config/blade.php';

/** @var $blade */
$tag = null;
if ($_GET && isset($_GET['id'])) {
    $id = trim($_GET['id']);
    $tag=\App\Model\Tag::find($id);
}
echo $blade->make('pages/add-new-tag',compact('tag'))->render();
