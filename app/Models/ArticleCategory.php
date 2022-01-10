<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

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
        self::deleting(function ($category) {
            // mengecek apakah article masih punya category
            if ($category->Article->count() > 0) {
                // menyiapkan pesan error
                $html = 'Category can not be deleted because it still has article : ';
                $html .= '<ul>';
                foreach ($category->Article as $article) {
                    $html .= "<li>$article->title</li>";
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
}
