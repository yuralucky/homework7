<?php

$engineResolver = new \Illuminate\View\Engines\EngineResolver();

$fileSystem = new \Illuminate\Filesystem\Filesystem();

$fileViewFinder = new \Illuminate\View\FileViewFinder(
    $fileSystem, ['../resources/views']
);

$compiler = new \Illuminate\View\Compilers\BladeCompiler($fileSystem, '../resources/cache');

$engineResolver->register('blade', function () use ($compiler) {
    return new \Illuminate\View\Engines\CompilerEngine($compiler);
});

$container = new \Illuminate\Container\Container();
$dispatcher = new \Illuminate\Events\Dispatcher($container);

$blade = new \Illuminate\View\Factory(
    $engineResolver,
    $fileViewFinder,
    $dispatcher
);

function view($view, $data = [], $mergeData = [])
{
    global $blade;

    return new \Illuminate\Http\Response(
        $blade->make($view, $data, $mergeData)->render()
    );
}