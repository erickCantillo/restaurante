<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['identificacion', 'name', 'email', 'password', 'empresa', 'gerencia', 'lugar_trabajo', 'cargo', 'celular'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['identificacion', 'password', 'remember_token', 'two_factor_recovery_codes',
    'two_factor_secret'];
 
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['email_verified_at' => 'datetime'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['profile_photo_url'];

    public function productos() 
    {
        return $this->hasMany(\App\Models\Producto::class);
    }
    
    public function categorias(){ 
        return $this->hasMany(\App\Models\Categoria::class);
    }

    public function equipos(){
        return $this->hasMany(\App\Models\Equipo::class, 'responsable');
    }

    public function prestar(){
        return $this->hasmMany(\App\Models\Prestamo::class, 'almacenista_entrega');
    }

}
