<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\softDeletes;

class Pembuat extends Model
{
    use softDeletes;
    public $incrementing = false;
    protected $guarded=[];
    
    protected $casts=[
        'id'=>'string'
    ];

    public static function boot(){
        parent::boot();
        
        static::creating(function($model){
            $model->id = (string)Str::uuid();
        });
    }
    /**
     * Get all of the comments for the Pembuat
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
    }
}
