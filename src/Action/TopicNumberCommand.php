<?php
declare(strict_types=1);

namespace Ilex\Tool\Action;

use Co\System;
use Ilex\Tool\Command\CommandInterface;
use League\CLImate\CLImate;

final class TopicNumberCommand
{

    public function __construct(
        private readonly CommandInterface $command,
        private readonly CLImate $climate,
    ) {
    }

    public function export(): void
    {
        $command = $this->command->getCommand();
        $this->climate->info('start export');
        System::exec($command);
        $this->climate->info('Success export');
        $this->climate->br();
    }
}
