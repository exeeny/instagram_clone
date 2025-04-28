<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function profile_image(){
        if ($this->image)
        {
            return '/storage/' . $this->image;
        } 
        else 
        {
            return '/images/noImage.jpg';
        }
        
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }
}
