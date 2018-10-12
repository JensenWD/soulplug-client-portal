<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeArchived($query)
    {
        return $query->where('archived', true);
    }

    public function scopeNotArchived($query)
    {
        return $query->where('archived', false);
    }
}
