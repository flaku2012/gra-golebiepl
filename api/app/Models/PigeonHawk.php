<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Models\User;
use App\Models\PigeonHawk;

class PigeonHawk extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $casts = [
        'food_type' => 'array'
    ];

    protected $fillable = ['name'];

    protected static function booted()
    {
        static::addGlobalScope('owns', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        });
    }

    // sprawdzić potrzebę funkcji
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // zweryfikować potrzębę
    public function pigeons()
    {
        return $this->hasMany(Pigeon::class);

    }

    public function getFoodType(int $id, $default = 0)
    {
        $field = "product_{$id}";
        if (array_key_exists($field, $this->food_type)) {
            return $this->food_type[$field] ?? $default;
        }
        return $default;
    }

    public function updateFoodType(array $revisions, bool $save = true): self
    {

        $this->food_type = array_merge($this->food_type, $revisions);

        if ($save) {
            $this->save();
        }
        return $this;
    }

}
