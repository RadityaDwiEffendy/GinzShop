<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\String_;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verification_code',
        'role_id',
        'username',
        'gambar',
        'email_verified_at'
    ];

    protected $attributes = [
        'role_id' => 4,
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

        /**
     * Update gambar user.
     *
     * @param string $gambarPath
     * @return bool
     */

     public function updateGambar(string $gambarPath): bool
     {
         $this->gambar = $gambarPath;
         $saved = $this->save();
     
         return $saved;
     }
     
}
