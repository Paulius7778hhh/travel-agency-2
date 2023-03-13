<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\fileExists;

class hotels extends Model
{
    use HasFactory;
    public function country()
    {
        return $this->belongsTo(country::class, 'country_id', 'id');
    }
    public function deletepic()
    {
        $pic = $this->picture;
        if (fileExists(public_path('pictures') . $pic)) {
            unlink(public_path('pictures') . '/' . $pic);
        }
        $this->picture = null;
        $this->save();
    }
}
