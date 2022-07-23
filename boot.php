<?php
declare(strict_types=1);

use Ilex\Tool\Utility\Env;
use Swoole\Runtime;

Runtime::enableCoroutine();

include __DIR__ . '/vendor/autoload.php';

$env = new Env();
$env->load(__DIR__);
