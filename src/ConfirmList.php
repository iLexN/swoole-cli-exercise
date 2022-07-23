<?php
declare(strict_types=1);

namespace Ilex\Tool;

use League\CLImate\CLImate;

final class ConfirmList
{

    public function __construct(
        private readonly CLImate $climate,
        private readonly array $files,
    ) {
    }

    public function exec(): bool
    {
        $this->list();
        return $this->confirm();
    }

    private function list(): void
    {
        $this->climate->br();
        $this->climate->comment('Download list');
        $this->climate->border('-', 100);
        $this->climate->columns($this->files);
        $this->climate->br();
    }

    private function confirm(): bool
    {
        return $this->climate->confirm('Continue?')->confirmed();
    }


}
