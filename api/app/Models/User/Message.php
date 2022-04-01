<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Models\User;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'receiver_id', 'thema', 'message'];

    protected static function booted()
    {
        static::addGlobalScope( 'owns', function(Builder $builder){
            $builder->where( 'receiver_id', auth()->id() );
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
