<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function profileImage()
    {
        $imagePath=($this->image)?$this->image:'profile/shKUvQPu8Tg5eoidR1FXfDgrxRQ3cB25CMMwcBHf.jpeg';
        return '/storage/'.$imagePath;

    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function followers()
    {
        
    return $this->belongsToMany('App\Models\User');
        
    }
}
