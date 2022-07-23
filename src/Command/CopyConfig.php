<?php
declare(strict_types=1);

namespace Ilex\Tool\Command;

use Ilex\Tool\Enum\Dir;

final class CopyConfig implements CopyFileInterface
{

    private readonly string $filename;

    public function __construct(
        private readonly string $pod,
        private readonly string $file,
    ) {
        $this->filename = $this->file . '.yml';
    }

    public function getCommand(): string
    {
        return sprintf('kubectl cp %s:%s/%s %s/%s',
            $this->pod,
            Dir::RemoteBackup->getDir(),
            $this->filename,
            Dir::Local->getDir(),
            $this->filename
        );
    }

    public function getFile(): string
    {
        return $this->filename;
    }
}
