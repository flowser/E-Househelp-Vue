<?php

namespace App\Models\Standard;

use Spatie\Permission\Traits\HasRoles;

use Illuminate\Notifications\Notifiable;
use App\Models\Organisation\Organisation;
use App\Models\Standard\Webservices\About;
use App\Models\Standard\Webservices\Advert;
use App\Models\Standard\Webservices\Feature;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Organisation\OrganisationAdmin;
use App\Models\Standard\Webservices\ServiceModel;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles,
        Notifiable,
        // SendUserPasswordReset,
        SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'user_type',
        'email',
        'password',
        'password_changed_at',
        'active',
        'confirmation_code',
        'confirmed',
        'timezone',
        'last_login_at',
        'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $dates = ['last_login_at', 'deleted_at'];

    /**
     * The dynamic attributes from mutators that should be returned with the user object.
     * @var array
     */
    protected $appends = ['full_name'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'confirmed' => 'boolean',
    ];

      public function getFullNameAttribute()
      {
          return $this->last_name ? $this->first_name.' '.$this->last_name : $this->first_name;
      }

      /**
       * @return string
       */
      public function getNameAttribute()
      {
          return $this->full_name;
      }

    //   public function organisation()
    // {
    //     return $this->hasOne(Organisation::class);
    // }

    public function organisationdirectors()
    {
        return $this->belongsToMany(Organisation::class,'organisation_director')
                    ->withPivot(
                        'photo',
                        'active',
                        'id_no',
                        'id_photo_front',
                        'id_photo_back',
                        'about_me',
                        'phone',
                        'landline',
                        'address',
                        'country_id',
                        'county_id',
                        'constituency_id',
                        'ward_id',
                        'position_id'
                    )
                    ->join('positions', 'organisation_director.position_id', '=', 'positions.id')
                    ->join('countries', 'organisation_director.country_id', '=', 'countries.id')
                    ->join('counties', 'organisation_director.county_id', '=', 'counties.id')
                    ->join('constituencies', 'organisation_director.constituency_id', '=', 'constituencies.id')
                    ->join('wards', 'organisation_director.ward_id', '=', 'wards.id')
                    ->select('organisations.*',
                        'organisation_director.*',
                            'countries.name as country_name',
                            'counties.name as county_name',
                            'constituencies.name as constituency_name',
                            'wards.name as ward_name',
                            'positions.name as position_name'
                    )
                    ->withTimestamps();
    }
    public function organisationadmins()
    {
        return $this->belongsToMany(Organisation::class,'organisation_admin')
                    ->withPivot(
                        'photo',
                        'active',
                        'id_no',
                        'id_photo_front',
                        'id_photo_back',
                        'about_me',
                        'phone',
                        'landline',
                        'address',
                        'country_id',
                        'county_id',
                        'constituency_id',
                        'ward_id',
                        'position_id'
                    )
                    ->join('positions', 'organisation_admin.position_id', '=', 'positions.id')
                    ->join('countries', 'organisation_admin.country_id', '=', 'countries.id')
                    ->join('counties', 'organisation_admin.county_id', '=', 'counties.id')
                    ->join('constituencies', 'organisation_admin.constituency_id', '=', 'constituencies.id')
                    ->join('wards', 'organisation_admin.ward_id', '=', 'wards.id')
                    ->select('organisations.*',
                        'organisation_admin.*',
                            'countries.name as country_name',
                            'counties.name as county_name',
                            'constituencies.name as constituency_name',
                            'wards.name as ward_name',
                            'positions.name as position_name'
                    )
                    ->withTimestamps();
    }
    public function organisationemployees()
    {
        return $this->belongsToMany(Organisation::class,'organisation_employee')
                    ->withPivot(
                        'photo',
                        'active',
                        'id_no',
                        'id_photo_front',
                        'id_photo_back',
                        'about_me',
                        'phone',
                        'landline',
                        'address',
                        'country_id',
                        'county_id',
                        'constituency_id',
                        'ward_id',
                        'position_id'
                    )
                    ->join('positions', 'organisation_employee.position_id', '=', 'positions.id')
                    ->join('countries', 'organisation_employee.country_id', '=', 'countries.id')
                    ->join('counties', 'organisation_employee.county_id', '=', 'counties.id')
                    ->join('constituencies', 'organisation_employee.constituency_id', '=', 'constituencies.id')
                    ->join('wards', 'organisation_employee.ward_id', '=', 'wards.id')
                    ->select('organisations.*',
                        'organisation_employee.*',
                            'countries.name as country_name',
                            'counties.name as county_name',
                            'constituencies.name as constituency_name',
                            'wards.name as ward_name',
                            'positions.name as position_name'
                    )
                    ->withTimestamps();
    }




    public function organisationadmin()
    {
        return $this->hasOne(OrganisationAdmin::class);

    }
    public function abouts()
    {
        return $this->hasMany(About::class);
    }
    public function features()
    {
        return $this->hasMany(Feature::class);
    }
    public function servicemodels()
    {
        return $this->hasMany(ServiceModel::class);
    }
    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }





}
