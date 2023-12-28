<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\CategoryNews;
use App\Models\CategoryUser;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_name', 'category_description', 'create_user_id', 'update_user_id', 'parent_id', 'media_id'];

    
    public function category_news(): HasMany
    {
        return $this->hasMany(CategoryNews::class);
    }


    public function category_user(): HasMany
    {
        return $this->hasMany(CategoryUser::class);
    }

}
