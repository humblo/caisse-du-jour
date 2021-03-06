<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'date',
        'content' => 'array'
    ];

    public function typeoperation()
    {
        return $this->belongsTo(TypeOperation::class,'typeoperation_id');
    }
}
