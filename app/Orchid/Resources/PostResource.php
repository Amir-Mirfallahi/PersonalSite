<?php

namespace App\Orchid\Resources;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use League\CommonMark\MarkdownConverter;
use Orchid\Attachment\Models\Attachment;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class PostResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Post::class;


    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('author_id')->hidden()->value(auth()->user()->id),
            Input::make('title')->title('Title')->placeholder("Enter post title"),
            Select::make('category_id')->title('Category')->fromModel(Category::class, "name"),

            Upload::make("post.image")
                ->groups('image')  // Group name 'photo'
                ->title('Image')
                ->acceptedFiles('image/*')
                ->maxFiles(1),
            SimpleMDE::make('content')->title("Content")->placeholder('Content of your post in markdown'),
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
            TD::make('category')->render(function ($model) {
                return $model->category->name;
            }),
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
            Sight::make("title"),
            Sight::make("admin")->render(fn($model) => $model->author?->name.' : '.$model->author?->email),
            Sight::make("category")->render(fn($model) => $model->category->name),
            Sight::make("content")->render(fn($model) => Str::markdown($model->content)),
            Sight::make("image")->render(fn($model) => '<img src='.$model->image()?->url." alt=".$model->image()?->alt.' />'),
            Sight::make("created_at")->render(function ($model) {
                return $model->created_at->toDateTimeString();
            }),
            Sight::make("updated_at")->render(function ($model) {
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
        if ($request->get('post')) {
            $item->image_id = $request->get("post")["image"][0];
        }
        $item->save();
    }
}
