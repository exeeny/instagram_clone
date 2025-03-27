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
        $imagePath = ($this->image) ? $this->image : '/profile/amVh5acEBnxMR8dKW64ZnCcgLvYBaqLaiSUUhyy6.jpg';
        return '/storage/' . $imagePath;
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }
}
