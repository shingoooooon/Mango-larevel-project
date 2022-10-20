<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const STATUS = [
        1 => [ 'label' => 'Untouched', 'class' => 'text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-rose-600 bg-rose-200 uppercase last:mr-0 mr-1'],
        2 => [ 'label' => 'In progress', 'class' => 'text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-blue-600 bg-blue-200 uppercase last:mr-0 mr-1'],
        3 => [ 'label' => 'Done', 'class' => 'text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-stone-600 bg-stone-200 uppercase last:mr-0 mr-1'],
    ];

    public function getStatusLabelAttribute()
    {
        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    public function getStatusClassAttribute()
    {
        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['class'];
    }

    public function folder()
    {
        return $this->belongsTo(Folder::class, 'folder_id');
    }
}


