<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $guarded = [];
    protected $hidden = ['pivot'];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
