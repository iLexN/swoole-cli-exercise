<?php
declare(strict_types=1);

namespace Ilex\Tool\Action;

use Co\System;
use Ilex\Tool\Command\GetPod;
use League\CLImate\CLImate;

final class GetPodCommand
{

    public function __construct(
        private readonly CLImate $climate,
    ) {
    }

    public function getPod(): string
    {
        $command = (new GetPod())->getCommand();
        $result = System::exec($command);
        $firstPod = $this->getFirstPod($result['output']);
        $this->climate->info('Find pod: ' . $firstPod);
        return $firstPod;
    }

    private function getFirstPod(string $output): string
    {
        $firstLine = strtok($output, "\n");
        return strtok($firstLine, ' ');
    }
}
