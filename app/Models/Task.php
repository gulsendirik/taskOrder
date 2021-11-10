<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'types', 'prerequisites', 'completed', 'amount', 'country'];

    protected $casts = [
        'amount' => 'array',
        'prerequisites' => 'array',
    ];

    public function scopeCompleted($query, $arg)
    {
        return $query->where('completed', $arg);
    }
}
