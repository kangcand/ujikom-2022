<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];
    public $timestamps = true;

    public function Article()
    {
        return $this->belongsToMany(
            'App\Models\Article',
            'article_tag',
            'tag_id',
            'article_id',
        );
    }

    // model event
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($tag) {
            // mengecek apakah article masih punya tag
            if ($tag->Article->count() > 0) {
                // menyiapkan pesan error
                $html = 'Tag can not be deleted because it still has <b>article</b> : ';
                $html .= '<ul>';
                foreach ($tag->Article as $tags) {
                    $html .= "<li>$tags->title</li>";
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
