<?php
declare(strict_types=1);

namespace Ilex\Tool\Utility;

use Dotenv\Dotenv;

final class Env
{

    public function load(string $path): void
    {
        $dotenv = Dotenv::createImmutable($path);
        $dotenv->safeLoad();
        $dotenv->required([
            'REMOTE_BACKUP',
            'LOCAL',
            'PROJECT_NAME',
            'POD_KEYWORD',
            'LOCAL_DOWNLOAD',
            'REMOTE_WEB_ROOT',
        ]);
    }
}
