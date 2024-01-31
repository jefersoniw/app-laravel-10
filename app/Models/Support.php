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

    public function createSupport($request)
    {
        $support = new self;
        $support->subject = $request['subject'];
        $support->status = 'a';
        $support->body = $request['body'];
        if (!$support->save()) {
            throw new Exception("erro ao salvar support");
        }

        return $support;
    }

    public function editSupport(Support $support, $request)
    {
        $support->subject = $request['subject'];
        $support->status = $request['status'];
        $support->body = $request['body'];
        if (!$support->save()) {
            throw new Exception("erro ao atualizar support");
        }

        return $support;
    }
}
