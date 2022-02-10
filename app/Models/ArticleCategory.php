<?php

namespace App\Models;

use Alert;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];
    public $timestamps = true;

    // one to many relation to Article (Models)
    public function Article()
    {
        return $this->hasMany('App\Models\Article', 'category_id');
    }

    // model event
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($parameter) {
            // mengecek apakah article masih punya category
            if ($parameter->Article->count() > 0) {
                Alert::error('Failed', 'Data not deleted because category have article');
                return false;
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
