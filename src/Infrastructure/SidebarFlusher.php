<?php

declare(strict_types=1);

namespace Tekfolio\Sidebar\Infrastructure;

interface SidebarFlusher
{
    public function flush(string $name): void;
}
