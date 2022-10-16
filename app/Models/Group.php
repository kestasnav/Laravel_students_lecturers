<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    public function lecture () {
        return $this->hasMany(Lecture::class);
    }
    public function course () {
        return $this->belongsTo(Course::class);
    }
    public function lecturer() {
        return $this->belongsTo(User::class);
    }
    public function students() {
        return $this->belongsToMany(User::class, 'group_user');
    }
    public function student() {
        return $this->hasMany(User::class);
    }
}
