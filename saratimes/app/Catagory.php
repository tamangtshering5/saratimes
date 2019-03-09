<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    public function SubCatagory(){
        return $this->hasMany(SubCatagory::class,'catagory_id','id');
    }

    public function Post(){
        return $this->belongsToMany(PostModel::class);
    }
}
