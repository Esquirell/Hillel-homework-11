<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cost extends Model
{
    protected $fillable = [
        'sum',
        'source',
        'comment'
    ];
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
