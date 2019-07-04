<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    public function news()
    {
        return $this->hasMany('App\News')->where('state', 1)->where('created_at', '<',
            Carbon::now()->toDateTimeString());
    }
}
