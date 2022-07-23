<?php
declare(strict_types=1);

use Ilex\Tool\Action\GetPodCommand;
use Ilex\Tool\Action\TopicNumberCommand;
use Ilex\Tool\Command\DrushTopicNumber;
use Ilex\Tool\Service\Download;

include __DIR__ . '/../boot.php';


Swoole\Coroutine\run(static function (): void {

    $climate = new League\CLImate\CLImate;

    $getPodCommand = new GetPodCommand($climate);
    $firstPod = $getPodCommand->getPod();

    $command = new DrushTopicNumber($firstPod);
    (new TopicNumberCommand($command, $climate))->export();

    $files = ['topic-article-number-'.date('Ymd').'.csv'];
    (new Download())($files, $climate, $firstPod);
});
