<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory,Searchable;
    protected $fillable = ['title','slug','body','subtitle','image','user_id','category_id','is_accepted'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function toSearchableArray(){
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'category' => $this->category,
            'subtitle' => $this->subtitle
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function readDuration(){
        $totalWords = str_word_count($this->body);
        $minusToRead = round($totalWords/200);
        return intval($minusToRead);
    }
}
