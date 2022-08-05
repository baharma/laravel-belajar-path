<?php

namespace App;

use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class Buku extends Model
{
    use softDeletes;
    
    public $incrementing = false;
    protected $guarded=[];
    protected $casts=[
        'id' => 'string'
    ];

    public static function boot(){
        parent::boot();

        static::creating(function($model){
            $model->id = (string)Str::uuid();
        });
    }
}
