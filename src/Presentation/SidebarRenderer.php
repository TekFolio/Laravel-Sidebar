<?php

declare(strict_types=1);

namespace Tekfolio\Sidebar\Presentation;

use Illuminate\Contracts\View\View;
use Tekfolio\Sidebar\Contracts\Sidebar;

interface SidebarRenderer
{
    public function render(Sidebar $sidebar): ?View;
}
