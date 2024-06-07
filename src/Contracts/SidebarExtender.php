<?php

declare(strict_types=1);

namespace Tekfolio\Sidebar\Contracts;

use Tekfolio\Sidebar\Contracts\Builder\Menu;

interface SidebarExtender
{
    public function extendWith(Menu $menu): Menu;
}
