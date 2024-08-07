<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function tagStr(){
        $tagArray = [];
        foreach($this->tags as $tag){
            $tagArray[] = $tag->title;
        }
                
        $tagStr = implode(',',  $tagArray);
        return $tagStr;
    }

}
