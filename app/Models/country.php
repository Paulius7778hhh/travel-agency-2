<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    use HasFactory;
    public function hotels()
    {
        return $this->belongsTo(hotels::class, 'hotels_id', 'id');
    }
}
