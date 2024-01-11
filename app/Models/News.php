<?php

namespace App\Models;

use App\Models\CategoryNews;
use App\Models\NewsTags;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;

    protected $news = 'composer_name';

    protected $fillable = ['title', 'content', 'composer_id', 'category_id', 'status', 'media_id', 'slug'];


    public function category_news(): HasMany
    {
        return $this->hasMany(CategoryNews::class);
    }

    public function news_tags(): HasMany
    {
        return $this->hasMany(NewsTags::class);
    }

 
//    public function news(): BelongsToMany
//    {
//        return $this->belongsToMany(News::class, 'news_tags', 'news_id', 'tag_id');
//    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
