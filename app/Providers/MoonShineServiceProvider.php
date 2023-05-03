<?php

namespace App\Providers;

use MoonShine\MoonShine;
use MoonShine\Menu\MenuItem;
use MoonShine\Menu\MenuGroup;
use Illuminate\Support\ServiceProvider;
use MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\OrganizationResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        app(MoonShine::class)->menu([
            MenuGroup::make('moonshine::ui.resource.system', [
                MenuItem::make('moonshine::ui.resource.admins_title', new MoonShineUserResource())
                    ->translatable()
                    ->icon('users'),
                MenuItem::make('moonshine::ui.resource.role_title', new MoonShineUserRoleResource())
                    ->translatable()
                    ->icon('bookmark'),
            ])->translatable()->icon('heroicons.server-stack'),

            MenuGroup::make('Master Data', [
                MenuItem::make('Organization', new OrganizationResource())
                    ->translatable()
                    ->icon('heroicons.building-library'),
            ])->translatable()->icon('heroicons.inbox-stack'),

            MenuItem::make('Documentation', 'https://laravel.com')
                ->badge(fn() => 'Check'),
        ]);
    }
}
