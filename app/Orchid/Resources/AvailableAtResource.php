<?php

namespace App\Orchid\Resources;

use App\Models\AvailableAt;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class AvailableAtResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = AvailableAt::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Group::make([
                Select::make("name")->title("name")->help("Social Media")
                ->options([
                    'instagram' => 'Instagram',
                    'facebook' => 'FaceBook',
                    "github" => 'GitHub',
                    'telegram' => 'Telegram',
                    "twitter" => 'X',
                    'linkedin' => 'Linkedin',
                ]),
                Input::make("url")->title("URL")->placeholder("Your social media link"),
            ])
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id'),

            TD::make("name"),

            TD::make("url")->render(fn($model) => '<a href="'.$model->url.'" target="_blank">'.$model->url.'</a>'),

        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make("name"),
            Sight::make("url"),
            Sight::make('created_at')->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
            Sight::make('updated_at')->render(function ($model) {
                return $model->updated_at->toDateTimeString();
            }),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}
