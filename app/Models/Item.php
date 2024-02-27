<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'box_id',
        'label',
        'description',
    ];

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function loan()
    {
        return $this->hasOne(Loan::class);
    }
}
