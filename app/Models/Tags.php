<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\NewsTags;

class Tags extends Model
{
    use HasFactory;

    protected $fillable = ['tag_name', 'tag_description', 'media_id'];


    public function news_tags(): HasMany
    {
        return $this->hasMany(NewsTags::class);
    }

}
