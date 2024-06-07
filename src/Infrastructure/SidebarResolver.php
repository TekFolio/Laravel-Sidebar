<?php

declare(strict_types=1);

namespace Tekfolio\Sidebar\Infrastructure;

use Tekfolio\Sidebar\Contracts\Sidebar;

interface SidebarResolver
{
    public function resolve(string $name): Sidebar;
}
