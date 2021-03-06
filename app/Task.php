<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\SoftDeletes;   

class Task extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = ['user_id', 'name', 'description', 'category_id'];

   
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
