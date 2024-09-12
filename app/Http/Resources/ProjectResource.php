<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            "imageUrl" => $this->image()?->url,
            "content" => $this->content,
            "services" => $this->services,
            "client" => $this->client,
            "created_at" => (new Carbon($this->created_at))->format("d M / Y"),
            "updated_at" => (new Carbon($this->updated_at))->format("d M / Y"),
        ];
    }
}
