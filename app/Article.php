<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
      'title',
      'body',
      'published_at',
    ];

    protected $dates = ['published_at']; //make a carbon instance, variables should be name "dates"
    public function scopePublished($query){
      $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query){
      $query->where('published_at', '>', Carbon::now());
    }

    public function setPublishedAtAttribute($date){
      $this->attributes['published_at'] = Carbon::parse($date);
    }

    /* dibawah ini kayak relationship di database */
    public function user(){
      return $this->belongsTo('App\User');
    }

    public function tags(){
      return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     *
     */
    public function getTagListAttribute(){
      return $this->tags->lists('id')->all();
    }
}
