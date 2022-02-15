<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'category_id', 'foto', 'description', 'price', 'stok'];
    public $timestamps = true;

    public function Category()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'category_id');
    }

    public function Tag()
    {
        return $this->belongsToMany(
            'App\Models\ProductTag',
            'product_tag',
            'product_id',
            'tag_id'
        );
    }

    // image
    public function image()
    {
        if ($this->foto && file_exists(public_path('images/Product/' . $this->foto))) {
            return asset('images/Product/' . $this->foto);
        } else {
            return asset('images/no_image.jpg');
        }
    }

    public function deleteImage()
    {
        if ($this->foto && file_exists(public_path('images/Product/' . $this->foto))) {
            return unlink(public_path('images/Product/' . $this->foto));
        }

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function productImage()
    {
        return $this->hasMany('App\Models\ProductImage', 'product_id');
    }
}
