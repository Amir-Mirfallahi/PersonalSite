<?php

namespace App\Orchid\Resources;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class ProjectResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Project::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Group::make([
                Input::make("title")->title("Title")->placeholder("Enter project's title"),
                Upload::make("project.image")->title("Image")->maxFiles(1)->groups("photo")->acceptedFiles("image/*"),
            ]),
            Group::make([
                Input::make("services")->title("Services")->placeholder("Enter services"),
                Input::make("client")->title("Client")->placeholder("Enter client name"),
            ]),
            SimpleMDE::make("content")->title("Description")->placeholder("Enter description"),
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

            TD::make('title'),

            TD::make('services'),

            TD::make('client'),

            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
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
            Sight::make("image")->render(fn($model) => '<img src="'.$model->image()?->url.'" alt="'.$model->image()?->alt.'" />'),
            Sight::make("id"),
            Sight::make("title"),
            Sight::make("services"),
            Sight::make("client"),
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


    public function save(ResourceRequest $request, Model $model): void
    {
        $item = $model->fill($request->all());
        if ($request->get("project")) {
            $item->image_id = $request->get("project")["image"][0];
        }
        $item->save();
    }
}
