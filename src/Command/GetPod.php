<?php
declare(strict_types=1);

namespace Ilex\Tool\Command;

use Ilex\Tool\Enum\Project;

final class GetPod implements CommandInterface
{

    public function getCommand(): string
    {
        return sprintf('kubectl get pod -l project=%s | grep %s',
            Project::name->getValue(),
            Project::keyword->getValue()
        );
    }
}
