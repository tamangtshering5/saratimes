<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCatagory extends Model
{
    public function Catagory(){
        return $this->belongsTo(Catagory::class);
    }

    public function Post(){
        return $this->belongsToMany(PostModel::class);
    }
}
