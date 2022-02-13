<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class);
    }



//    public function attach_book_to_author_and_publisher($author){
//        $this->authors()->attach($author->author_id);
//    }
//
//    public function attach_book_to_publisher($publisher){
//        return $this->authors()->attach($publisher);
//    }
}
