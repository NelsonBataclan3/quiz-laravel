<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use GeniusTS\Roles\Traits\HasRoleAndPermission;
use GeniusTS\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract
{
    use Authenticatable, CanResetPassword, HasRoleAndPermission;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'gaurdian_name', 
        'email', 'phone_number', 'address', 
        'city', 'state', 'pincode', 'password',
        'organization_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relationship: Belongs to Organization
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
