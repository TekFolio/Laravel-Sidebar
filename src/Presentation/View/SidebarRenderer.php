<?php

declare(strict_types=1);

namespace Tekfolio\Sidebar\Presentation\View;

use Illuminate\Contracts\View\View;
use Tekfolio\Sidebar\Contracts\Sidebar;
use Tekfolio\Sidebar\Presentation\AbstractRenderer;
use Tekfolio\Sidebar\Presentation\SidebarRenderer as BaseSidebarRenderer;

class SidebarRenderer extends AbstractRenderer implements BaseSidebarRenderer
{
    protected string $view = 'sidebar::menu';

    public function render(Sidebar $sidebar): ?View
    {
        $menu = $sidebar->getMenu();

        if ($menu->isAuthorized()) {
            $groups = [];
            foreach ($menu->getGroups() as $group) {
                $groups[] = (new GroupRenderer($this->factory))->render($group);
            }

            return $this->factory->make($this->view, [
                'groups' => $groups,
            ]);
        }

        return null;
    }
}
