<?php

namespace App\Orchid\Resources;

use App\Models\Testimonial;
use Illuminate\Support\Str;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class TestimonialResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Testimonial::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Group::make([
                Input::make("author")->title("Author")->placeholder("Who wrote this?"),
                Input::make("role")->title("Role")->placeholder("What is his role?")
            ]),
            SimpleMDE::make('content')->title("Content")->placeholder("Enter the content"),
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

            TD::make('author'),

            TD::make("role"),

            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
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
            Sight::make("id"),
            Sight::make("author"),
            Sight::make("role"),
            Sight::make("content")->render(fn($model) => Str::markdown($model->content)),
            Sight::make("created_at")->render(fn($model) => $model->created_at->toDateTimeString()),
            Sight::make("updated_at")->render(fn($model) => $model->updated_at->toDateTimeString()),
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
