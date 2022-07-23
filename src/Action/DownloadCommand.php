<?php
declare(strict_types=1);

namespace Ilex\Tool\Action;

use Co\System;
use Ilex\Tool\Command\CopyFileInterface;
use League\CLImate\CLImate;

final class DownloadCommand
{

    public function __construct(
        private readonly CLImate $climate,
    ) {
    }

    public function download(CopyFileInterface $copyCommand): void
    {
        $filename = $copyCommand->getFile();
        $command = $copyCommand->getCommand();

        $this->climate->info("start download file:$filename");
        $result = System::exec($command);
        $this->formatOutput($filename, $result['output']);
    }

    private function formatOutput(string $filename, mixed $output): void
    {
        if (str_contains($output, 'error')) {
            $this->climate->error("$filename cannot download");
            return;
        }
        $this->climate->info("$filename download <blink><yellow>success</yellow></blink>");
    }
}
