<?php

namespace Ilex\Tool\Command;

interface CopyFileInterface extends CommandInterface
{

    public function getFile(): string;
}
