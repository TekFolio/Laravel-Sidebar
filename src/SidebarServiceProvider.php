<?php

declare(strict_types=1);

namespace Tekfolio\Sidebar;

use Illuminate\Foundation\Application;
use Tekfolio\Sidebar\Contracts\Builder\Append;
use Tekfolio\Sidebar\Contracts\Builder\Badge;
use Tekfolio\Sidebar\Contracts\Builder\Group;
use Tekfolio\Sidebar\Contracts\Builder\Item;
use Tekfolio\Sidebar\Contracts\Builder\Menu;
use Tekfolio\Sidebar\Domain\DefaultAppend;
use Tekfolio\Sidebar\Domain\DefaultBadge;
use Tekfolio\Sidebar\Domain\DefaultGroup;
use Tekfolio\Sidebar\Domain\DefaultItem;
use Tekfolio\Sidebar\Domain\DefaultMenu;
use Tekfolio\Sidebar\Infrastructure\SidebarFlusher;
use Tekfolio\Sidebar\Infrastructure\SidebarFlusherFactory;
use Tekfolio\Sidebar\Infrastructure\SidebarResolver;
use Tekfolio\Sidebar\Infrastructure\SidebarResolverFactory;
use Tekfolio\Sidebar\Presentation\SidebarRenderer;
use Tekfolio\Sidebar\Presentation\View\SidebarRenderer as IlluminateSidebarRenderer;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class SidebarServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('sidebar')
            ->hasConfigFile()
            ->hasTranslations()
            ->hasViews();
    }

    public function packageRegistered(): void
    {
        $this->app->bind(SidebarResolver::class, function (Application $app) {
            $resolver = SidebarResolverFactory::getClassName(
                name: $app['config']->get('sidebar.cache.method')
            );

            return $app->make($resolver);
        });

        $this->app->bind(SidebarFlusher::class, function (Application $app) {
            $flusher = SidebarFlusherFactory::getClassName(
                name: $app['config']->get('sidebar.cache.method')
            );

            return $app->make($flusher);
        });

        $this->app->singleton(SidebarManager::class);

        $this->bindingSidebarMenu();
    }

    public function bindingSidebarMenu(): void
    {
        $this->app->bind(Menu::class, DefaultMenu::class);
        $this->app->bind(Group::class, DefaultGroup::class);
        $this->app->bind(Item::class, DefaultItem::class);
        $this->app->bind(Badge::class, DefaultBadge::class);
        $this->app->bind(Append::class, DefaultAppend::class);
        $this->app->bind(SidebarRenderer::class, IlluminateSidebarRenderer::class);
    }
}
