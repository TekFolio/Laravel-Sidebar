<?php

declare(strict_types=1);

namespace Tekfolio\Infrastructure;

use Tekfolio\Sidebar\Infrastructure\SidebarFlusher;

final class NullSidebarFlusher implements SidebarFlusher
{
    public function flush(string $name): void
    {
    }
}
