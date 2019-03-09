<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    public function Catagory(){
        return $this->belongsToMany(Catagory::class)->withTimestamps();
    }

    public function SubCatagory(){
        return $this->belongsToMany(SubCatagory::class)->withTimestamps();
    }
}
