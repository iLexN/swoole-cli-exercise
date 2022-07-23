<?php
declare(strict_types=1);

namespace Ilex\Tool\Command;

use Ilex\Tool\Enum\Dir;

final class DrushConfigExport implements CommandInterface
{
    public function __construct(
        private readonly string $pod,
    ) {
    }

    public function getCommand(): string
    {
        $remote = Dir::RemoteBackup->getDir();
        return sprintf('kubectl exec %s -c php -- drush @server config-export --destination=%s -y',
            $this->pod,
            $remote
        );
    }
}
