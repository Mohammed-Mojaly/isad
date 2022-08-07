<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Beneficiary extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function country() : BelongsTo
    {
        return $this->belongsTo(Country::class);
    }


}
