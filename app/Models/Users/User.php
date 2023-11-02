<?php
namespace App\Models\Users;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;


use Spatie\Permission\Traits\HasRoles;

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
    protected $table = 'users';

    protected $fillable = [
        'name',
        'surname',
        'email',
        'email_verified_at',
        'password',
        'current_team_id',
        'profile_photo_path',
        'role',
        'active',
        'allow',
        'doc_type',
        'document',
        'mobile',
        'subdomain',
        'detail',
        'company',
        'country',
        'nit',
        'address',
        'confirmation_code',
        'code_valid_until',
        'update_password',
        'refer_code',
        'blocked',
        'age',
        'position',
        'total_hours',
        'last_login'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    protected function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=ffffff&background=7929E2';
    }


    /**
     * checks if the user belongs to a particular group
     * @param string|array $role
     * @return bool
     */
    public function role($role)
    {
        $role = (array)$role;
        return in_array($this->role, $role);
    }

    public function socialProviders()
    {
        return $this->hasMany('App\Models\Users\SocialProvider');
    }

    public function articles()
    {
        return $this->hasMany('App\Articles\Article');
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->select("users.*")->where('users.name','LIKE',"%$keyword%")
                     ->orwhere('users.surname','LIKE',"%$keyword%")
                     ->orwhere('users.email','LIKE',"%$keyword%")
                     ;
    }

    public function userLogs()
    {
        return $this->hasMany('App\Models\Users\UserLog');
    }

    public function userAlerts()
    {
        return $this->hasMany('App\Models\Users\UserAlert');
    }

    public function userMessages()
    {
        return $this->hasMany('App\Models\Users\UserMessage');
    }

    public function plans()
    {
        return $this->belongsToMany('App\Models\Plans\Plan', 'user_plan');
    }

    public function businesses()
    {
        return $this->belongsToMany('App\Models\Businesses\Business', 'user_business');
    }

    public function distributorOrders(){
        return $this->hasMany('App\Models\Orders\DistributorOrder');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Orders\Order');
    }

    public function imeis()
    {
        return $this->hasMany('App\Models\Servies\Imei');
    }

    public function cellularTechnicalServices()
    {
        return $this->hasMany('App\Models\Services\CellularTechnicalService');
    }


    public function turns()
    {
        return $this->hasMany('App\Models\Turns\Turn');
    }




}
