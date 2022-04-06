<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles(){
        return $this->hasMany(Article::class);
    }
    public function categories(){
        return $this->hasMany(Categorie::class);
    }
    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    public function authorizeRoles($roles){
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) || abort(401, 'This action is unauthorized.');
    }
    public function hasAnyRole($roles){
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    
    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role){
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function estAdmin()
    {
        return $this->roles()->where('name', 'admin')->first();
    }
}
