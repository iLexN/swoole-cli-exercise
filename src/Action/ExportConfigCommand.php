<?php
declare(strict_types=1);

namespace Ilex\Tool\Action;

use Co\System;
use Ilex\Tool\Command\CommandInterface;
use League\CLImate\CLImate;

final class ExportConfigCommand
{

    public function __construct(
        private readonly CommandInterface $command,
        private readonly CLImate $climate,
    ) {
    }

    public function export(): void
    {
        $command = $this->command->getCommand();
        $this->climate->info('start export config');
        System::exec($command);
        $this->climate->info('Success export config');
        $this->climate->br();
    }
}
