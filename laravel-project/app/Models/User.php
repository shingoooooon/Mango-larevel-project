<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    const STATUS = [
        false => [ 'label' => '◻︎'],
        true => [ 'label' => '☑'],
    ];

    public function getAdminLabelAttribute()
    {
        $is_admin = $this->attributes['is_admin'];

        if (!isset(self::STATUS[$is_admin])) {
            return '';
        }

        return self::STATUS[$is_admin]['label'];
    }

    public function folders()
    {
        return $this->hasMany(Folder::class, 'user_id');
    }
}
