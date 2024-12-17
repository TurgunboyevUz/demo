<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('tree', function () {
    $exclude = [
        'vendor', 'public', 'bootstrap', 'storage', 'config', 'composer.json', 'composer.lock', 'artisan', 'seeders', 'factories',
    ];

    $path = base_path();
    $tree = exec("tree --prune -I '".implode('|', $exclude)."' $path", $output);

    foreach ($output as $line) {
        $this->comment($line);
    }
});

Artisan::command('pint', function () {
    exec('./vendor/bin/pint', $output);

    foreach ($output as $line) {
        $this->comment($line);
    }
});
