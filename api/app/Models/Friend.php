<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Friend extends Model
{
    use HasFactory;
    public $timestamps = false;

    const PENDING = 0;
    const ACCEPTED = 1;
    const DENIED = 2;
    const BLOCKED = 3;

}
