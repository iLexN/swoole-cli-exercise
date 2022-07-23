<?php
declare(strict_types=1);

namespace Ilex\Tool\Command;

use Ilex\Tool\Enum\Drush;

final class DrushTopicNumber implements CommandInterface
{
    public function __construct(
        private readonly string $pod,
    ) {
    }

    public function getCommand(): string
    {
        return sprintf('kubectl exec %s -c php -- drush @server %s:export-topic-article',
            $this->pod,
            Drush::Prefix->getValue(),
        );
    }
}
