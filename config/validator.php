<?php

use Illuminate\Validation\DatabasePresenceVerifier;

$filesystem = new Illuminate\Filesystem\Filesystem();
$loader = new Illuminate\Translation\FileLoader($filesystem, realpath('../resources/lang'));
$translator = new \Illuminate\Translation\Translator($loader, 'en');
$validator = new Illuminate\Validation\Factory($translator);

$databasePresenceVerifier = new DatabasePresenceVerifier($capsule->getDatabaseManager());
$validator->setPresenceVerifier($databasePresenceVerifier);


function validator()
{
    global $validator;

    return $validator;
}