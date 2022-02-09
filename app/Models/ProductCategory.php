<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['name', 'slug'];
    public $timestamps = true;

    // one to many relation to Product (Models)
    public function Product()
    {
        return $this->hasMany('App\Models\Product', 'product_id');
    }

    // model event
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($product) {
            // mengecek apakah Product masih punya product
            if ($product->Product->count() > 0) {
                // menyiapkan pesan error
                $html = 'product can not be deleted because it still has Product : ';
                $html .= '<ul>';
                foreach ($product->Product as $Product) {
                    $html .= "<li>$Product->title</li>";
                }
                $html .= '</ul>';
                Session::flash("flash_notification", [
                    "level" => "danger",
                    "message" => $html,
                ]);
                // cancel delete process
                return false;
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
