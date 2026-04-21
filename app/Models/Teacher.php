<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Teacher extends Model
{
    use HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'quotes',
        'image_url',
    ];
}
