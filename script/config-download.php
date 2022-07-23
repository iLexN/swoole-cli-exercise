<?php
declare(strict_types=1);

use Ilex\Tool\Action\DownloadCommand;
use Ilex\Tool\Action\ExportConfigCommand;
use Ilex\Tool\Action\GetPodCommand;
use Ilex\Tool\Command\CopyConfig;
use Ilex\Tool\Command\DrushConfigExport;
use Ilex\Tool\ConfirmList;

include __DIR__ . '/../boot.php';


Swoole\Coroutine\run(static function (): void {

    $climate = new League\CLImate\CLImate;

    /** @var array<string> $files */
    $files = include __DIR__ . '/../files/config-files.php';

    $getPodCommand = new GetPodCommand($climate);
    $firstPod = $getPodCommand->getPod();

    $confirmList = new ConfirmList($climate, $files);
    if (!$confirmList->exec()) {
        return;
    }

    $command = new DrushConfigExport($firstPod);
    (new ExportConfigCommand($command, $climate))->export();

    foreach ($files as $file) {
        $downloadCommand = new DownloadCommand($climate);
        $fileCommand = new CopyConfig($firstPod, $file);
        go(static function () use ($downloadCommand, $fileCommand): void {
            $downloadCommand->download($fileCommand);
        });
    }
});
