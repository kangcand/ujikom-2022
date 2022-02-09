<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];
    public $timestamps = true;

    // one to many relation to Product (Models)
    public function Product()
    {
        return $this->belongsToMany(
            'App\Models\Product',
            'product_tag',
            'tag_id',
            'product_id',
        );
    }

    // model event
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($tag) {
            // mengecek apakah Product masih punya tag
            if ($tag->Product->count() > 0) {
                // menyiapkan pesan error
                $html = 'tag can not be deleted because it still has Product : ';
                $html .= '<ul>';
                foreach ($tag->Product as $Product) {
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
