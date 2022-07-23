<?php
declare(strict_types=1);

namespace Ilex\Tool\Command;

use Ilex\Tool\Enum\Dir;

final class CopyFile implements CopyFileInterface
{

    public function __construct(
        private readonly string $pod,
        private readonly string $filename,
    ) {
    }

    public function getCommand(): string
    {
        return sprintf('kubectl cp %s:%s/%s %s/%s',
            $this->pod,
            Dir::RemoteWebRoot->getDir(),
            $this->filename,
            Dir::LocalDownload->getDir(),
            $this->filename
        );
    }

    public function getFile(): string
    {
        return $this->filename;
    }
}
