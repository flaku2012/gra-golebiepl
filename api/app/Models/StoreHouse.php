<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Product;

class StoreHouse extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity'
    ];

    protected static function booted()
    {
        static::addGlobalScope( 'owns', function(Builder $builder){
            $builder->where( 'user_id', auth()->id() );
        });
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

}
