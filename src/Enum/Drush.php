<?php
declare(strict_types=1);

namespace Ilex\Tool\Enum;

enum Drush
{
   case Prefix;

    public function getValue(): string
    {
        return match ($this) {
            self::Prefix => $_ENV['COMMAND_PREFIX'],
        };
    }
}
