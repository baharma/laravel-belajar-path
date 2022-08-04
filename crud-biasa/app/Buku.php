<?php

namespace App;

use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Buku extends Model
{
    use softDeletes;
    
    protected $guarded=[];
    protected $hidden=[];

    public static function boot(){
        parent::boot();

        self::creating(function($model){
            $model->id = Uuid::uuid4();
        });
    }
}
