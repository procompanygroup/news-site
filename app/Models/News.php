<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\CategoryNews;
use App\Models\NewsTags;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'composer_id', 'category_id', 'status', 'media_id'];


    public function category_news(): HasMany
    {
        return $this->hasMany(CategoryNews::class);
    }

    public function news_tags(): HasMany
    {
        return $this->hasMany(NewsTags::class);
    }

}
