<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'category_id', 'foto', 'content', 'user_id'];
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
        if ($this->foto && file_exists(public_path('images/article/' . $this->foto))) {
            return asset('images/article/' . $this->foto);
        } else {
            return asset('images/no_image.jpg');
        }
    }

    public function deleteImage()
    {
        if ($this->foto && file_exists(public_path('images/article/' . $this->foto))) {
            return unlink(public_path('images/article/' . $this->foto));
        }

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
