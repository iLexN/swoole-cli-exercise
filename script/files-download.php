<?php
declare(strict_types=1);

use Ilex\Tool\Action\GetPodCommand;
use Ilex\Tool\ConfirmList;
use Ilex\Tool\Service\Download;

include __DIR__ . '/../boot.php';

Swoole\Coroutine\run(static function (): void {

    $climate = new League\CLImate\CLImate;

    /** @var array<string> $files */
    $files = include __DIR__ . '/../files/download-files.php';

    $getPodCommand = new GetPodCommand($climate);
    $firstPod = $getPodCommand->getPod();

    $confirmList = new ConfirmList($climate, $files);
    if (!$confirmList->exec()) {
        return;
    }

    (new Download())($files, $climate, $firstPod);
});
