<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\softDeletes;

class Buku extends Model
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
   * Get the user that owns the Buku
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function pembuat1(): BelongsTo
  {
      return $this->belongsTo(User::class, 'pembuat_id', 'id');
  }  
}
