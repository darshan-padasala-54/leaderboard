<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersActivity extends Model
{
    use HasFactory;

    const POINT = 20;
    protected $fillable = ['user_id','activity_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $user = User::find($model->user_id);
            $user->points = $user ? $user->points + self::POINT : self::POINT;
            $user->save();
        });
    }
}
