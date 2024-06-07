<?php

declare(strict_types=1);

namespace Tekfolio\Sidebar\Presentation\View;

use Tekfolio\Sidebar\Contracts\Builder\Badge;
use Tekfolio\Sidebar\Presentation\AbstractRenderer;

class BadgeRenderer extends AbstractRenderer
{
    protected string $view = 'sidebar::badge';

    public function render(Badge $badge): ?string
    {
        if ($badge->isAuthorized()) {
            return $this->factory->make($this->view, [
                'badge' => $badge,
            ])->render();
        }

        return null;
    }
}
