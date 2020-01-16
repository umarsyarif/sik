<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'content'];

    use SoftDeletes;

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        $this->slug = \Str::slug($this->category()->first()['name'].'-'.$this->title);
        $this->user_id = Auth::id();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
