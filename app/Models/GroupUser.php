<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    use HasFactory;

    protected $table='group_user';

    public function students() {
        return $this->belongsToMany(User::class, 'group_user');
    }
    public function groups() {
        return $this->belongsToMany(Group::class, 'group_user');
    }
}
