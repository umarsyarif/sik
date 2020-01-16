<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $fillable = ['name'];

    use SoftDeletes;

    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
