<?php
declare(strict_types=1);

namespace Ilex\Tool\Enum;

enum Project
{

    case name;

    case keyword;

    public function getValue(): string
    {
        return match ($this) {
            self::name => $_ENV['PROJECT_NAME'],
            self::keyword => $_ENV['POD_KEYWORD'],
        };
    }
}
