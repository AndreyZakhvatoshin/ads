<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    const STATUS_WAIT = 'wait';
    const STATUS_ACTIVE = 'active';
    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function getRoles()
    {
        return [
            self::ROLE_USER => 'user',
            self::ROLE_ADMIN => 'admin',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN ? true : false;
    }

    public function isVerify(): bool
    {
        return $this->email_verified_at == null ? false : true;
    }

    public function changeRole(string $role)
    {
        if (!array_key_exists($role, $this->getRoles())) {
            throw new \InvalidArgumentException("Указанной роли '{$role}' не существует");
        }
        if ($this->role === $role) {
            throw new \DomainException('role already exist');
        }
        $this->update(['role' => $role]);
    }
}
