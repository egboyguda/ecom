<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Context;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_user');
    }

    public function hasRole(string $role): bool
    {
        //dd kukuwaon sa context an roles
        if(Context::hasHidden('roles')){
            return in_array(strtolower($role),Context::getHidden('roles'));
        }

        return $this->roles->contains('name', $role);
    }
    public function hasAnyRole(array $roles): bool
    {
        if(Context::hasHidden('roles')){
            $matches= array_intersect(
                array_map('strtolower',$roles),
                
                Context::getHidden('roles'));

            return !empty($matches);
        }

        return $this->roles()->whereIn('name', $roles)->exists();
    }
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
}
