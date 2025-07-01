<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    protected $appends = ['created_date', 'display_photo', 'registered_date'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function getCreatedDateAttribute()
    {
        return $this->created_at->format('d F, Y');
    }
     public function getDisplayPhotoAttribute()
    {
        $photo = $this->photo;
        if($photo){
            return url('storage/' .$photo);
        }
        return url('https://ui-avatars.com/api/?name=' . $this->name . '&background=random');
    }
    public function getRegisteredDateAttribute()
    {
        return $this->created_at->format( 'F Y');
    }
}