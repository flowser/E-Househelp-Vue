<?php

namespace App\Models\Househelp;


use App\Models\Bureau\Bureau;
use App\Models\Standard\Ward;
use App\Models\Standard\County;
use App\Models\Standard\Gender;
use App\Models\Standard\Country;
use App\Models\Standard\Constituency;
use Illuminate\Database\Eloquent\Model;

class Househelp extends Model
{
    // protected $table = 'bureau_househelp';
    protected $fillable = [
        'user_id',
        'bureau_id',
        'photo',
        'about_me',
        'phone',
        'address',
        'active',
        'employmentstatus',
        'hiredstatus',

        'country_id',
        'county_id',
        'constituency_id',
        'ward_id',

        //filters

        'age',
        'gender_id',
        'education_id',
        'experience_id',
        'maritalstatus_id',
        'tribe_id',
        'skill_id',
        'operation_id',
        'duration_id',
        'englishstatus_id',
        'religion_id',
        'kid_id',
    ];

    protected $casts = [
        'active' => 'boolean',
        'employmentstatus' => 'boolean',
        'hired'=> 'boolean',
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


    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function bureau()
    {
        return $this->belongsTo(Bureau::class);
    }


    //has many
    public function househelpkin()
    {
        return $this->hasOne(HousehelpKin::class);
    }
    public function idstatus()
    {
        return $this->hasOne(IDstatus::class);
    }
    public function healthtatus()
    {
        return $this->hasOne(Healthstatus::class);
    }
    public function househelpkins()
    {
        return $this->belongsToMany(User::class,'househelp_kin')
                    ->withPivot(
                        'photo',
                        'active',
                        'id_no',
                        'id_photo_front',
                        'id_photo_back',
                        'phone',
                        'landline',
                        'address',
                        'gender_id',
                        'relationship_id',
                        'country_id',
                        'county_id',
                        'constituency_id',
                        'ward_id'
                    )
                    ->join('genders', 'househelp_kin.gender_id', '=', 'genders.id')
                    ->join('relationships', 'househelp_kin.relationship_id', '=', 'relationships.id')
                    ->join('countries', 'househelp_kin.country_id', '=', 'countries.id')
                    ->join('counties', 'househelp_kin.county_id', '=', 'counties.id')
                    ->join('constituencies', 'househelp_kin.constituency_id', '=', 'constituencies.id')
                    ->join('wards', 'househelp_kin.ward_id', '=', 'wards.id')
                    ->select('users.*',
                        'househelp_kin.*',
                            'genders.name as gender_name',
                            'relationship.name as relationship_name',
                            'countries.name as country_name',
                            'counties.name as county_name',
                            'constituencies.name as constituency_name',
                            'wards.name as ward_name'
                    )
                    ->withTimestamps();
    }
}
