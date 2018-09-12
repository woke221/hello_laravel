<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('create:controller {namespace} {name}', function () {
    $namespace = $this->argument('namespace');
    $name      = $this->argument('name');

    $content = File::get("Packages/Controller.txt");
    $content = str_replace("{namespace}", $namespace, $content);
    $content = str_replace("{name}", $name, $content);

    File::put("Packages/Controllers/{$namespace}/{$name}.php", $content);
    $this->info("成功创建控制器：Packages/Controllers/{$namespace}/{$name}.php");
})->describe('创建自定义控制器，目录在Packages/Controllers');