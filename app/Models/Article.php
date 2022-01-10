<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'category_id', 'image', 'content', 'user_id'];
    public $timestamps = true;

    public function Category()
    {
        return $this->belongsTo('App\Models\ArticleCategory', 'category_id');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function ArticleTag()
    {
        return $this->belongsToMany(
            'App\Models\ArticleTag',
            'article_tag',
            'article_id',
            'tag_id'
        );
    }

    // image
    public function image()
    {
        if ($this->image && file_exists(public_path('images/article/' . $this->image))) {
            return asset('images/article/' . $this->image);
        } else {
            return asset('images/no_image.jpg');
        }
    }

    public function deleteImage()
    {
        if ($this->image && file_exists(public_path('images/article/' . $this->image))) {
            return unlink(public_path('images/article/' . $this->image));
        }

    }
}
