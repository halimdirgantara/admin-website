<?php

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\Email;
use MoonShine\Fields\Image;
use MoonShine\Fields\Phone;
use App\Models\Organization;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Flex;
use MoonShine\Resources\Resource;
use MoonShine\Actions\FiltersAction;
use Illuminate\Database\Eloquent\Model;

class OrganizationResource extends Resource
{
    public static string $model = Organization::class;

    public static string $title = 'Organization';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Name', 'name'),
            Text::make('Abbreviation', 'abbreviation'),
            Slug::make('Slug')->from('name')->separator('-')->unique(),
            Textarea::make('Description', 'description'),
            Text::make('Address', 'address'),
            Text::make('Latitude', 'latitude'),
            Text::make('Longitude', 'longitude'),
            Email::make('Email', 'email'),
            Flex::make([
            Phone::make('Phone', 'phone'),
            Phone::make('Fax', 'fax'),
            ]),
            Image::make('Logo', 'logo')
                ->dir('/logo') // The directory where the files will be stored in storage (by default /)
                ->disk('public') // Filesystems disk
                ->allowedExtensions(['jpg', 'gif', 'png']), // Allowable extensions

        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
