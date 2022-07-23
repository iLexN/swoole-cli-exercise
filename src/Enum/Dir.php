<?php
declare(strict_types=1);

namespace Ilex\Tool\Enum;

enum Dir
{

    case RemoteBackup;

    case Local;

    case LocalDownload;

    case RemoteWebRoot;

    case KubeConfig;

    public function getDir(): string
    {
        return match ($this) {
            self::Local => $_ENV['LOCAL'],
            self::RemoteBackup => $_ENV['REMOTE_BACKUP'],
            self::LocalDownload => $_ENV['LOCAL_DOWNLOAD'],
            self::RemoteWebRoot => $_ENV['REMOTE_WEB_ROOT'],
            self::KubeConfig => $_ENV['KUBE_CONFIG'],
        };
    }
}
