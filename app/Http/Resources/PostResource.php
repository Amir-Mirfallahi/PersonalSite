<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Orchid\Attachment\Models\Attachment;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "author" => (new UserResource($this->author)),
            "slug" => $this->slug,
            "imageUrl" => $this->image()?->url,
            "content" => $this->content,
            "category" => new CategoryResource($this->category),
            "created_at" => (new Carbon($this->created_at))->format("d M / Y"),
            "updated_at" => (new Carbon($this->updated_at))->format("d M / Y"),
        ];
    }
}
