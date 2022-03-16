<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Pigeon;

class Pigeon extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected static function booted()
    {
        static::addGlobalScope( 'owns', function(Builder $builder){
            $builder->where( 'user_id', auth()->id() );
        });
    }

    public function parent_mother()
    {
        return $this->hasOne(Pigeon::class, 'id', 'pigeon_mother_id')->select(['id', 'name']);
    }

    public function parent_father()
    {
        return $this->hasOne(Pigeon::class, 'id', 'pigeon_father_id')->select(['id', 'name']);
    }

    public function partner()
    {
        return $this->hasOne(Pigeon::class, 'id', 'pigeon_partner_id')->select(['id', 'name']);
    }

}
