<?php
require __DIR__ . "/vendor/autoload.php";
$app = require __DIR__ . "/bootstrap/app.php";
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$ref = new ReflectionObject($kernel);
$method = $ref->getMethod('getArtisan');
$method->setAccessible(true);
$artisan = $method->invoke($kernel);
foreach (array_keys($artisan->all()) as $name) {
    if (strpos($name, 'route:') === 0) {
        echo $name . "\n";
    }
}
try {
    $command = $artisan->get('route:list');
    echo 'got route:list: ' . get_class($command) . "\n";
    $refCommand = new ReflectionObject($command);
    $prop = $refCommand->getProperty('laravel');
    $prop->setAccessible(true);
    echo 'laravel set: ' . ($prop->getValue($command) ? 'yes' : 'no') . "\n";
} catch (Throwable $e) {
    echo get_class($e) . ': ' . $e->getMessage() . "\n";
}
