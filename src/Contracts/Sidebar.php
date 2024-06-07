<?php

declare(strict_types=1);

namespace Tekfolio\Sidebar\Contracts;

use Tekfolio\Sidebar\Contracts\Builder\Menu;

interface Sidebar
{
    public function build();

    public function getMenu(): Menu;
}
