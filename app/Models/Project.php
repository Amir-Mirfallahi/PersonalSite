<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Project extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    protected $fillable = ['title', 'image_id', 'content', 'services', 'client'];

    public function image()
    {
        if ($this->image_id) {
        return Attachment::query()->find($this->image_id);
        }
        return null;
    }
}
