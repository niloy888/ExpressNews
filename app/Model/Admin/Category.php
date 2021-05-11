<?php

namespace App\Model\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function posts()
    {
        $date = Carbon::now()->format('Y/m/d');
        return $this->hasMany('App\Model\Admin\Post')->where('publication_date',$date)->latest();
    }
}
