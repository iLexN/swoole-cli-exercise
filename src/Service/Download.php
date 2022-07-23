<?php
declare(strict_types=1);

namespace Ilex\Tool\Service;

use Ilex\Tool\Action\DownloadCommand;
use Ilex\Tool\Command\CopyFile;
use League\CLImate\CLImate;

final class Download
{
    public function __invoke(
        array $files,
        CLImate $climate,
        string $firstPod
    ): void {
        foreach ($files as $file) {
            $downloadCommand = new DownloadCommand($climate);
            $fileCommand = new CopyFile($firstPod, $file);
            go(static function () use ($downloadCommand, $fileCommand): void {
                $downloadCommand->download($fileCommand);
            });
        }
    }
}
