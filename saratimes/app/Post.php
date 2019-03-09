<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function Catagory(){
        return $this->belongsToMany(Catagory::class);
    }

    public function SubCatagory(){
        return $this->belongsToMany(SubCatagory::class);
    }
}
