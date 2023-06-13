<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable
{
  use HasApiTokens;
  use HasFactory;
  use HasProfilePhoto;
  use Notifiable;
  use TwoFactorAuthenticatable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'description',
    'amigos',
    'suscripciones'
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
    'two_factor_recovery_codes',
    'two_factor_secret',
    'role',
    'id'
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array<int, string>
   */
  protected $appends = [
    'profile_photo_url',
    'role'
  ];

  //Rol 2 -> Admin (Puede crear preguntas y eliminar contenido si lo ve conveniente), Rol 1 -> Moderador (Sólo puede moderar contenido, no crear preguntas.)
  public function tieneRol()
  {
    if ($this->rol === 2) {
      return 1 && 2;
    } else if ($this->role === 1) {
      return 1;
    } else {
      return redirect()->back();
    }
  }

  public function amigos()
  {
    return $this->belongsToMany(User::class, 'amigos', 'user_id', 'friend_id')
      ->wherePivot('estado', 'aceptado')
      ->withTimestamps();
  }

  public function friendRequests()
  {
    return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id')
      ->wherePivot('estado', 'pendiente')
      ->withTimestamps();
  }

  public function removeFriend(User $user)
  {
    $this->amigos()->detach($user->id);
    $user->amigos()->detach($this->id);
  }

  // Comprobar si un usuario es amigo
  public function friendshipWith(User $user)
  {
    return $this->amigos()
      ->where('friend_id', $user->id)
      ->orWhere('user_id', $user->id)
      ->first();
  }

  public function solicitudesAmistadPendientes()
    {
        return $this->belongsToMany(User::class, 'amigos', 'friend_id', 'user_id')
                    ->wherePivot('estado', 'pendiente')
                    ->withTimestamps();
    }


}