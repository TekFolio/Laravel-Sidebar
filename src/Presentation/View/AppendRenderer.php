<?php

declare(strict_types=1);

namespace Tekfolio\Sidebar\Presentation\View;

use Tekfolio\Sidebar\Contracts\Builder\Append;
use Tekfolio\Sidebar\Presentation\AbstractRenderer;

class AppendRenderer extends AbstractRenderer
{
    protected string $view = 'sidebar::append';

    public function render(Append $append): ?string
    {
        if ($append->isAuthorized()) {
            return $this->factory->make($this->view, [
                'append' => $append,
            ])->render();
        }

        return null;
    }
}
