<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pigeon;

class Marketplace extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function pigeon()
    {
        return $this->hasOne(Pigeon::class, 'id', 'pigeon_id');
    }

}
