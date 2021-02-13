<?php

use App\Model\Tag;

require_once '../vendor/autoload.php';
require_once '../config/eloquent.php';
require_once '../config/blade.php';

/** @var $blade */
if ($_POST && isset($_POST['title']) || isset($_POST['slug'])) {
    if (isset($_POST['id'])&& intval($_POST['id'])) {
        $tag = Tag::find(trim($_POST['id']));
        $tag->title = trim($_POST['title']);
        $tag->slug = trim($_POST['slug']);
        $tag->update();
    } else {
        $tag = new Tag();
        $tag->title = trim($_POST['title']);
        $tag->slug = trim($_POST['slug']);
        $tag->save();
    }
}
$tags = Tag::all();
echo $blade->make('pages/list-tags', compact('tags'))->render();