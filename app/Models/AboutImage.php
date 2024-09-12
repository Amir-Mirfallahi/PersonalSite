<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class AboutImage extends Model
{
    use HasFactory, AsSource, Attachable, Filterable;

    public function image()
    {
        return Attachment::query()->find($this->image_id);
    }

    protected $fillable = ['image_id'];
}
