<?php

namespace App\Orchid\Resources;

use App\Models\AboutImage;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class AboutImageResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = AboutImage::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Upload::make("about.image")
                ->groups('image')  // Group name 'photo'
                ->title('Image')
                ->acceptedFiles('image/*')
                ->maxFiles(1),
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

            TD::make('image')->render(function ($model) {
                if ($model->image()) {
                    return '<img src="' . $model->image()->url() . '" alt="Post Image" width="100">';
                } else {
                    return 'No image';
                }
            }),

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
            Sight::make('id'),
            Sight::make('image')->render(function ($model) {
                if ($model->image()) {
                    return '<img src="' . $model->image()->url() . '" alt="Post Image" width="200">';
                } else {
                    return 'No image';
                }
            }),
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


    public function save(ResourceRequest $request, $model): void
    {
        // Fill the model with other data
        $item = $model->fill($request->all());
        if ($request->get('about')) {
            $item->image_id = $request->get("about")["image"][0];
        }
        $item->save();
    }
}
