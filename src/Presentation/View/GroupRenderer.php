<?php

declare(strict_types=1);

namespace Tekfolio\Sidebar\Presentation\View;

use Tekfolio\Sidebar\Contracts\Builder\Group;
use Tekfolio\Sidebar\Presentation\AbstractRenderer;

class GroupRenderer extends AbstractRenderer
{
    protected string $view = 'sidebar::group';

    public function render(Group $group): ?string
    {
        if ($group->isAuthorized()) {
            $items = [];
            foreach ($group->getItems() as $item) {
                $items[] = (new ItemRenderer($this->factory))->render($item);
            }

            return $this->factory->make($this->view, [
                'group' => $group,
                'items' => $items,
            ])->render();
        }

        return null;
    }
}
