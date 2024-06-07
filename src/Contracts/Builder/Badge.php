<?php

declare(strict_types=1);

namespace Tekfolio\Sidebar\Contracts\Builder;

interface Badge extends Authorizable
{
    public function getValue(): mixed;

    public function setValue(mixed $value): self;

    public function getClass(): string;

    public function setClass(string $class): self;
}
