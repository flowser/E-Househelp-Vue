<?php

namespace App\Models\Bureau;

use App\Models\Standard\User;
use App\Models\Standard\Ward;
use App\Models\Standard\County;
use App\Models\Standard\Country;
use App\Models\Househelp\Househelp;
use App\Models\Standard\Constituency;
use Illuminate\Database\Eloquent\Model;
use App\Models\Organisation\Organisation;





class Bureau extends Model
{
    protected $fillable = [
        'organisation_id',
        'name',
        'logo',
        'about_us',
        'what_we_do',
        'bureau_email',
        'phone',
        'landline',
        'website',
        'address',
        'active',
        'country_id',
        'county_id',
        'constituency_id',
        'ward_id',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    //belongs to
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function county()
    {
        return $this->belongsTo(County::class);
    }
    public function constituency()
    {
        return $this->belongsTo(Constituency::class);
    }
    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    public function bureaudirectors()
    {
        return $this->belongsToMany(User::class,'bureau_director')
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
                    ->join('positions', 'bureau_director.position_id', '=', 'positions.id')
                    ->join('countries', 'bureau_director.country_id', '=', 'countries.id')
                    ->join('counties', 'bureau_director.county_id', '=', 'counties.id')
                    ->join('constituencies', 'bureau_director.constituency_id', '=', 'constituencies.id')
                    ->join('wards', 'bureau_director.ward_id', '=', 'wards.id')
                    ->select('users.*',
                        'bureau_director.*',
                            'countries.name as country_name',
                            'counties.name as county_name',
                            'constituencies.name as constituency_name',
                            'wards.name as ward_name',
                            'positions.name as position_name'
                    )
                    ->withTimestamps();
    }
    public function bureauadmins()
    {
        return $this->belongsToMany(User::class,'bureau_admin')
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
                    ->join('positions', 'bureau_admin.position_id', '=', 'positions.id')
                    ->join('countries', 'bureau_admin.country_id', '=', 'countries.id')
                    ->join('counties', 'bureau_admin.county_id', '=', 'counties.id')
                    ->join('constituencies', 'bureau_admin.constituency_id', '=', 'constituencies.id')
                    ->join('wards', 'bureau_admin.ward_id', '=', 'wards.id')
                    ->select('users.*',
                        'bureau_admin.*',
                            'countries.name as country_name',
                            'counties.name as county_name',
                            'constituencies.name as constituency_name',
                            'wards.name as ward_name',
                            'positions.name as position_name'
                    )
                    ->withTimestamps();
    }
    public function bureauemployees()
    {
        return $this->belongsToMany(User::class,'bureau_employee')
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
                    ->join('positions', 'bureau_employee.position_id', '=', 'positions.id')
                    ->join('countries', 'bureau_employee.country_id', '=', 'countries.id')
                    ->join('counties', 'bureau_employee.county_id', '=', 'counties.id')
                    ->join('constituencies', 'bureau_employee.constituency_id', '=', 'constituencies.id')
                    ->join('wards', 'bureau_employee.ward_id', '=', 'wards.id')
                    ->select('users.*',
                        'bureau_employee.*',
                            'countries.name as country_name',
                            'counties.name as county_name',
                            'constituencies.name as constituency_name',
                            'wards.name as ward_name',
                            'positions.name as position_name'
                    )
                    ->withTimestamps();
    }




    public function househelps()
    {
        return $this->hasMany(Househelp::class);
    }

     //about page
}
