<?php

use App\Model\Tag;

require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';
require_once '../config/blade.php';

/** @var $blade */
if ($_GET && isset($_GET['id'])) {
    $id = intval(trim($_GET['id']));
    $tag= Tag::find($id);
    $tag->delete();
}
$tags= Tag::all();
echo $blade->make('pages/list-tags',compact('tags'))->render();