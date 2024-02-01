<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    protected $table = 'supports';
    protected $fillable = [
        'subject',
        'status',
        'body',
    ];
}
