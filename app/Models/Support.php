<?php

namespace App\Models;

use App\Enums\SupportStatus;
use Exception;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'supports';
    protected $fillable = [
        'user_id',
        'subject',
        'status',
        'body',
    ];

    public function status(): Attribute
    {
        return Attribute::make(
            set: fn (SupportStatus $status) => $status->name,
        );
    }

    public function replies()
    {
        return $this->hasMany(ReplySupport::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
