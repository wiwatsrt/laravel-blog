<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use L5Starter\Core\Support\DateFormatter;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'publish_date', 'category_id', 'status_id'
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value);
    }

    public function getPublishDateAtAttribute()
    {
        return DateFormatter::format($this->attributes['publish_date']);
    }

    public function getPublishHourAttribute()
    {
        $dateTime = Carbon::createFromFormat("Y-m-d H:i:s", $this->attributes['publish_date']);
        return $dateTime->hour;
    }

    public function getPublishMinuteAttribute()
    {
        $dateTime = Carbon::createFromFormat("Y-m-d H:i:s", $this->attributes['publish_date']);
        return $dateTime->minute;
    }

    public function author()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\PostCategory');
    }

    public function status()
    {
        return $this->belongsTo('App\PostStatus');
    }
}
