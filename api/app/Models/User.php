<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\User\Work;
use App\Models\User\Message;
use App\Models\PigeonHawk;
use App\Models\Friend;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function work()
    {
        return $this->hasOne(Work::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function pigeonhawks()
    {
        return $this->hasMany(PigeonHawk::class);
    }





    // RELATIONS FRIENDS

    //new
    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
        ->withPivot('status');
    }

    


    // public function getFriendsAttribute()
    // {
    //     if ( ! array_key_exists('friends', $this->relations)) $this->loadFriends();

    //     return $this->getRelation('friends');
    // }

    public function friendsOfMine()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
		->wherePivot('status', '=', Friend::ACCEPTED) // to filter only accepted
        ->withPivot('status'); // or to fetch accepted value
    }

    public function friendOf()
    {
        return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id')
		->wherePivot('status', '=', 1)
        ->withPivot('status');
    }

    protected function loadFriends()
    {
        if ( ! array_key_exists('friends', $this->relations))
        {
            $friends = $this->mergeFriends();

            $this->setRelation('friends', $friends);
        }
    }

    protected function mergeFriends()
    {
        return $this->friendsOfMine->merge($this->friendOf);
    }

    // END RELATIONS FRIENDS





}
