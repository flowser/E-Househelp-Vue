<?php

namespace App\Http\Controllers\Backend\Househelp;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Bureau\Bureau;
use App\Models\Standard\User;
use App\Models\Standard\Gender;
use App\Models\Standard\Position;
use Illuminate\Support\Facades\DB;
use App\Models\Househelp\Househelp;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Models\Organisation\Organisation;
use App\Models\Househelp\HousehelpDirector;
use App\Models\Househelp\Standard\Idstatus;
use Propaganistas\LaravelPhone\PhoneNumber;
use App\Models\Househelp\Standard\Healthstatus;


class HousehelpController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            if (auth()->user()->hasRole('Organisation Director', 'Organisation Superadmin','Organisation Admin','Organisation Employee')) {
                $househelps = Househelp:: with('country', 'county', 'constituency', 'ward',
                'genders', 'education', 'experiences', 'tribes', 'skills','durations',
                'operations', 'englishstatuses','maritalstatuses','locations', 'religions',
                '_i_dstatus','healthstatus', 'bureau')//single has
                                       ->get();
                    return response()-> json([
                        'househelps' => $househelps,
                    ], 200);
            }elseif(auth()->user()->hasRole('Bureau Director')) {
                        $bureau = Auth::user()->bureaudirectors()->first();
                        $househelps = Househelp:: with('country', 'county', 'constituency', 'ward',
                        'genders', 'education', 'experiences', 'tribes', 'skills','durations',
                        'operations', 'englishstatuses','maritalstatuses','locations', 'religions',
                        '_i_dstatus','healthstatus', 'househelpkins')//single has
                        ->where('bureau_id', $bureau->id)
                                               ->get();
                           return response()-> json([
                                'househelps' => $househelps,
                            ], 200);

            }elseif(auth()->user()->hasRole('Bureau Admin')){
                $bureau = Auth::user()->bureauadmins()->first();
                $househelps = Househelp:: with('country', 'county', 'constituency', 'ward',
                'genders', 'education', 'experiences', 'tribes', 'skills','durations',
                'operations', 'englishstatuses','maritalstatuses','locations', 'religions',
                '_i_dstatus','healthstatus', 'househelpkins')//single has
                ->where('bureau_id', $bureau->id)
                                       ->get();
                   return response()-> json([
                        'househelps' => $househelps,
                    ], 200);
            }elseif(auth()->user()->hasRole('Bureau Employee')){
                $bureau = Auth::user()->bureauemployees()->first();
                $househelps = Househelp:: with('country', 'county', 'constituency', 'ward',
                'genders', 'education', 'experiences', 'tribes', 'skills','durations',
                'operations', 'englishstatuses','maritalstatuses','locations', 'religions',
                '_i_dstatus','healthstatus', 'househelpkins')//single has
                ->where('bureau_id', $bureau->id)
                                       ->get();
                   return response()-> json([
                        'househelps' => $househelps,
                    ], 200);
            }else{
                $househelps = Househelp:: with('country', 'county', 'constituency', 'ward',
                'genders', 'education', 'experiences', 'tribes', 'skills','durations',
                'operations', 'englishstatuses','maritalstatuses','locations', 'religions',
                '_i_dstatus','healthstatus')//single has
                ->where('bureau_id', $bureau->id)
                                       ->get();
                   return response()-> json([
                        'househelps' => $househelps,
                    ], 200);

            }
        }

    }
//for fresh store

    public function verifyDemographics (Request $request)
    {

        // if($request->has('IDstatus') && $request['IDstatus'] == "HasID") {

        //     $request->validate([
        //         'househelp_first_name'  =>  'required',
        //         'househelp_last_name'  =>  'required',
        //         'email'  =>  'required|email|max:255|unique:users',
        //         'househelp_password'  =>  'required',
        //         'househelp_phone'  =>  'phone:AUTO,MOBILE',
        //         'househelp_landline'  =>  'phone:AUTO,MOBILE',
        //         'househelp_address'  =>  'required|digits_between:1,20',
        //         'househelp_birth_date'  =>  'required',
        //         'househelp_gender_id'  =>  'required',
        //         'househelp_country_id'  =>  'required',
        //         'househelp_county_id'  =>  'required',
        //         'househelp_constituency_id'  =>  'required',
        //         'househelp_ward_id'  =>  'required',
        //         'househelp_photo'  =>  'required',
        //         //default
        //         'househelp_id_status'       =>'required',
        //         'househelp_id_status_reason'=>'required',
        //         //condition
        //         'househelp_id_number'      =>  'required|digits_between:7,10',
        //         'househelp_id_photo_front' =>'required',
        //         'househelp_id_photo_back'  =>'required',
        //    ]);
        // }elseif($request->has('IDstatus') && $request['IDstatus'] == "HASIDbutlost"){
        //     $request->validate([
        //         'househelp_first_name'  =>  'required',
        //         'househelp_last_name'  =>  'required',
        //         'email'  =>  'required|email|max:255|unique:users',
        //         'househelp_password'  =>  'required',
        //         'househelp_phone'  =>  'phone:AUTO,MOBILE',
        //         'househelp_landline'  =>  'phone:AUTO,MOBILE',
        //         'househelp_address'  =>  'required|digits_between:1,20',
        //         'househelp_birth_date'  =>  'required',
        //         'househelp_gender_id'  =>  'required',
        //         'househelp_country_id'  =>  'required',
        //         'househelp_county_id'  =>  'required',
        //         'househelp_constituency_id'  =>  'required',
        //         'househelp_ward_id'  =>  'required',
        //         'househelp_photo'  =>  'required',
        //         //default
        //         'househelp_id_status'       =>'required',
        //         'househelp_id_status_reason'=>'required',
        //         //condition
        //         'househelp_id_number'      =>  'required|digits_between:7,10',
        //         'househelp_waiting_card_photo'=>'required',
        //    ]);
        // }elseif($request->has('IDstatus') && $request['IDstatus'] == "NOIDbutapplied"){
        //     $request->validate([
        //         'househelp_first_name'  =>  'required',
        //         'househelp_last_name'  =>  'required',
        //         'email'  =>  'required|email|max:255|unique:users',
        //         'househelp_password'  =>  'required',
        //         'househelp_phone'  =>  'phone:AUTO,MOBILE',
        //         'househelp_landline'  =>  'phone:AUTO,MOBILE',
        //         'househelp_address'  =>  'required|digits_between:1,20',
        //         'househelp_birth_date'  =>  'required',
        //         'househelp_gender_id'  =>  'required',
        //         'househelp_country_id'  =>  'required',
        //         'househelp_county_id'  =>  'required',
        //         'househelp_constituency_id'  =>  'required',
        //         'househelp_ward_id'  =>  'required',
        //         'househelp_photo'  =>  'required',
        //         //default
        //         'househelp_id_status'       =>'required',
        //         'househelp_id_status_reason'=>'required',
        //         //condition
        //         'househelp_ref_number'      =>'required',
        //         'househelp_waiting_card_photo'=>'required',
        //    ]);
        // }elseif($request->has('IDstatus') && $request['IDstatus'] == "NOID"){
        //     $request->validate([
        //         'househelp_first_name'  =>  'required',
        //         'househelp_last_name'  =>  'required',
        //         'email'  =>  'required|email|max:255|unique:users',
        //         'househelp_password'  =>  'required',
        //         'househelp_phone'  =>  'phone:AUTO,MOBILE',
        //         'househelp_landline'  =>  'phone:AUTO,MOBILE',
        //         'househelp_address'  =>  'required|digits_between:1,20',
        //         'househelp_birth_date'  =>  'required',
        //         'househelp_gender_id'  =>  'required',
        //         'househelp_country_id'  =>  'required',
        //         'househelp_county_id'  =>  'required',
        //         'househelp_constituency_id'  =>  'required',
        //         'househelp_ward_id'  =>  'required',
        //         'househelp_photo'  =>  'required',
        //         //default
        //         'househelp_id_status'       =>'required',
        //         'househelp_id_status_reason'=>'required',
        //         //condition no checking id here
        //         // 'househelp_ref_number'      =>'required',
        //         // 'househelp_waiting_card_photo'=>'required',
        //    ]);
        // }
    }
    public function verifyAttributes (Request $request)
    {
        // return $request;

        // if($request->has('HealthStatus') && $request['HealthStatus'] == "HEALTHY") {
        //         $request->validate([
        //             'househelp_education_id'        => 'required',
        //             'househelp_experience_id'       => 'required',
        //             'househelp_maritalstatus_id'    => 'required',
        //             'househelp_tribe_id'            => 'required',
        //             'househelp_skill_id'            => 'required',
        //             'househelp_operation_id'        => 'required',
        //             'househelp_duration_id'         => 'required',
        //             'househelp_englishstatus_id'    => 'required',
        //             'househelp_religion_id'         => 'required',
        //             'househelp_kid_id'              => 'required',
        //             //CONDITION
        //             'status'                        => 'required',
        //             'HIV_status'                    => 'required',

        //         ]);
        // }elseif($request->has('HealthStatus') && $request['HealthStatus'] == "HASMINOR"){
        //          $request->validate([
        //             'househelp_education_id'        => 'required',
        //             'househelp_experience_id'       => 'required',
        //             'househelp_maritalstatus_id'    => 'required',
        //             'househelp_tribe_id'            => 'required',
        //             'househelp_skill_id'            => 'required',
        //             'househelp_operation_id'        => 'required',
        //             'househelp_duration_id'         => 'required',
        //             'househelp_englishstatus_id'    => 'required',
        //             'househelp_religion_id'         => 'required',
        //             'househelp_kid_id'              => 'required',
        //             //CONDITION
        //             'HIV_status'                    => 'required',
        //             'allergy'                       => 'required',
        //             'specify'                       => 'required',

        //         ]);
        // }elseif($request->has('HealthStatus') && $request['HealthStatus'] == "HASCHRONIC"){
        //         $request->validate([
        //             'househelp_education_id'        => 'required',
        //             'househelp_experience_id'       => 'required',
        //             'househelp_maritalstatus_id'    => 'required',
        //             'househelp_tribe_id'            => 'required',
        //             'househelp_skill_id'            => 'required',
        //             'househelp_operation_id'        => 'required',
        //             'househelp_duration_id'         => 'required',
        //             'househelp_englishstatus_id'    => 'required',
        //             'househelp_religion_id'         => 'required',
        //             'househelp_kid_id'              => 'required',
        //             //CONDITION
        //             'HIV_status'                    => 'required',
        //             'other_chronics'                => 'required',
        //             'chronic_details'               => 'required',
        //         ]);
        // }
    }

    public function verifyKin (Request $request)
    {
    //     $this->validate($request,[
    //             'househelpkin_first_name'  =>  'required',
    //             'househelpkin_last_name'  =>  'required',
    //             // 'email'  =>  'required|email|max:255|unique:users',
    //             // 'password'  =>  'required',
    //             'househelpkin_phone'  =>  'phone:AUTO,MOBILE',
    //             'househelpkin_id_no'  =>  'required|digits_between:7,10',
    //             'househelpkin_address'  =>  'required|digits_between:1,20',
    //             'househelpkin_relationship_id'  =>  'required',
    //             'househelpkin_gender_id'  =>  'required',
    //             'househelpkin_country_id'  =>  'required',
    //             'househelpkin_county_id'  =>  'required',
    //             'househelpkin_constituency_id'  =>  'required',
    //             'househelpkin_ward_id'  =>  'required',
    //             'househelpkin_photo'  =>  'required',
    //             'househelpkin_id_photo_front'  =>  'required',
    //             'househelpkin_id_photo_back'  =>  'required',
    //    ]);
    }

    //for update
    public function verifyUpdateDemographics (Request $request)
    {
        $this->validate($request,[

       ]);
    }
    public function verifyUpdateAttributes (Request $request)
    {
        $this->validate($request,[

       ]);
    }

    public function store(Request $request, $id)
    {
        // return $request;
        $bureau= Bureau::find($id);
        // return $request;
        if ($bureau){
            $user = new User();
            $user->first_name = $request->househelp_first_name;
            $user->last_name = $request->househelp_last_name;
            $user->email = $request->email;
            $user->active     = true;
            $user->confirmed  = true;
            $user->confirmation_code = md5(uniqid(mt_rand(), true));
            $user->user_type      = 'Househelp';
            $user->password   = Hash::make($request->househelp_password);

            $user->assignRole('Househelp');

                $passport = $request->househelp_photo;
                if($passport){
                     //processing passport name
                     $ps_strpos = strpos($passport, ';'); //positionof image name semicolon
                     $ps_sub = substr($passport, 0, $ps_strpos);
                     $ps_ex = explode('/', $ps_sub)[1];
                     $ps_name = time().".".$ps_ex;

                     $ps_Path = public_path()."/assets/bureau/img/househelps/passports";
                         $ps_img = Image::make($passport);
                         $ps_img ->save($ps_Path.'/'.$ps_name);
                     //end processing
                    $photo= $ps_name;
                }

                // demographic




                $date_of_birth = Carbon::parse($request->input('househelp_birth_date'));
                $now = Carbon::now();
                $househelp_date_of_birth = $date_of_birth->diffInYears($now);

            if($user){
                $bureau->bureauhousehelps()->save($user, [
                        'active'           => true,
                        'employmentstatus' => false,
                        'hiredstatus'      => false,
                        'photo'            => $photo,
                        'about_me'         => $request->househelp_about_me,
                        'phone'            => $request->househelp_phone,
                        'address'          => $request->househelp_address,
                        'country_id'       => $request->househelp_country_id,
                        'county_id'        => $request->househelp_county_id,
                        'constituency_id'  => $request->househelp_constituency_id,
                        'ward_id'          => $request->househelp_ward_id,

                            //attributes
                        'age'            => $househelp_date_of_birth,
                        'gender_id'      => $request->househelp_gender_id,
                        'education_id'   => $request->househelp_education_id,
                        'experience_id'  => $request->househelp_experience_id,
                        'maritalstatus_id'=> $request->househelp_maritalstatus_id,
                        'tribe_id'       => $request->househelp_tribe_id,
                        'skill_id'       => $request->househelp_skill_id,
                        'operation_id'   => $request->househelp_operation_id,
                        'duration_id'    => $request->househelp_duration_id,
                        'englishstatus_id'=> $request->househelp_englishstatus_id,
                        'religion_id'    => $request->househelp_religion_id,
                        'kid_id'         => $request->househelp_kid_id,

                    ]);

                    $bureau_househelp = DB::table('bureau_househelp')
                                        ->where('user_id', $user->id)
                                        ->first();

                    if($bureau_househelp){
                        //id status
                        //househelp Front side id image
                        $frontside_id = $request->househelp_id_photo_front;
                        if($frontside_id != null){
                            //processing front side id imagee
                            $fr_id_strpos = strpos($frontside_id, ';');
                            $fr_id_sub = substr($frontside_id, 0, $fr_id_strpos);
                            $fr_id_ex = explode('/', $fr_id_sub)[1];
                            $fr_id_name = time().".".$fr_id_ex;

                            $fr_id_Path = public_path()."/assets/bureau/img/househelps/IDs/front";
                                $fr_id_img = Image::make($frontside_id);
                                $fr_id_img ->save($fr_id_Path.'/'.$fr_id_name);
                            //end processing
                            $id_photo_front = $fr_id_name;
                        }else{
                            $id_photo_front = null;
                        }
                        $backside_id = $request->househelp_id_photo_back;
                        if($backside_id != null){
                            //processing front side id imagee
                            $bs_id_strpos = strpos($backside_id, ';');
                            $bs_id_sub = substr($backside_id, 0, $bs_id_strpos);
                            $bs_id_ex = explode('/', $bs_id_sub)[1];
                            $bs_id_name = time().".".$bs_id_ex;

                            $bs_id_Path = public_path()."/assets/bureau/img/househelps/IDs/back";
                                $bs_id_img = Image::make($backside_id);
                                $bs_id_img ->save($bs_id_Path.'/'.$bs_id_name);
                            //end processing
                            $id_photo_back = $bs_id_name;
                        }else{
                            $id_photo_back = null;
                        }

                        $waiting_card = $request->househelp_waiting_card_photo;
                        if($waiting_card != null){
                            //processing front side id imagee
                            $wc_strpos = strpos($waiting_card, ';');
                            $wc_sub = substr($waiting_card, 0, $wc_strpos);
                            $wc_ex = explode('/', $wc_sub)[1];
                            $wc_name = time().".".$wc_ex;

                            $wc_Path = public_path()."/assets/bureau/img/househelps/waitingcards";
                                $wc_img = Image::make($waiting_card);
                                $wc_img ->save($wc_Path.'/'.$wc_name);
                            //end processing
                            $waiting_card_photo = $wc_name;
                        }else{
                            $waiting_card_photo = null;
                        }
                        $Idstatus = new Idstatus();
                        $Idstatus->bureau_househelp_id  = $bureau_househelp->id ;
                        $Idstatus ->status              = $request ->househelp_id_status;
                        $Idstatus ->reason              = $request ->househelp_id_status_reason;
                        $Idstatus ->id_number           = $request ->househelp_id_number;
                        $Idstatus ->id_photo_front      = $id_photo_front;
                        $Idstatus ->id_photo_back       = $id_photo_back;
                        $Idstatus ->waiting_card_photo  = $waiting_card_photo;
                        $Idstatus ->ref_number          = $request ->househelp_ref_number;
                        $Idstatus->save();

                        //health status
                        $Healthstatus = new Healthstatus();
                        $Healthstatus->bureau_househelp_id  = $bureau_househelp->id;
                        $Healthstatus->status          = $request->status;
                        $Healthstatus->HIV_status      = $request->HIV_status;
                        $Healthstatus->allergy         = $request->allergy;
                        $Healthstatus->specify         = $request->specify;
                        $Healthstatus->other_chronics  = $request->other_chronics;
                        $Healthstatus->chronic_details = $request->chronic_details;
                        $Healthstatus->save();
                    }
            }
            if($user){//adding kin
                $user2 = new User();
                $user2->first_name = $request->househelpkin_first_name;
                $user2->last_name  = $request->househelpkin_last_name;
                // $user2->email      = $request->email;
                $user2->active     = true;
                // $user2->confirmed  = true;
                // $user2->confirmation_code = md5(uniqid(mt_rand(), true));
                $user2->user_type      = 'Househelp Kin';
                // $user2->password   = Hash::make($request->password);

                $user2->assignRole('Househelp Kin');

                    $passport = $request->househelpkin_photo;
                    if($passport){
                        //processing passport name
                        $ps_strpos = strpos($passport, ';'); //positionof image name semicolon
                        $ps_sub = substr($passport, 0, $ps_strpos);
                        $ps_ex = explode('/', $ps_sub)[1];
                        $ps_name = time().".".$ps_ex;

                        $ps_Path = public_path()."/assets/bureau/img/househelps/househelpkins/passports";
                            $ps_img = Image::make($passport);
                            $ps_img ->save($ps_Path.'/'.$ps_name);
                        //end processing
                        $photo= $ps_name;
                    }
                    //househelp Front side id image
                    $frontside_id = $request->househelpkin_id_photo_front;
                    if($frontside_id){
                        //processing front side id imagee
                        $fr_id_strpos = strpos($frontside_id, ';');
                        $fr_id_sub = substr($frontside_id, 0, $fr_id_strpos);
                        $fr_id_ex = explode('/', $fr_id_sub)[1];
                        $fr_id_name = time().".".$fr_id_ex;

                        $fr_id_Path = public_path()."/assets/bureau/img/househelps/househelpkins/IDs/front";
                            $fr_id_img = Image::make($frontside_id);
                            $fr_id_img ->save($fr_id_Path.'/'.$fr_id_name);
                        //end processing
                        $id_photo_front = $fr_id_name;
                    }
                    $backside_id = $request->househelpkin_id_photo_back;
                    if($backside_id){
                        //processing front side id imagee
                        $bs_id_strpos = strpos($backside_id, ';');
                        $bs_id_sub = substr($backside_id, 0, $bs_id_strpos);
                        $bs_id_ex = explode('/', $bs_id_sub)[1];
                        $bs_id_name = time().".".$bs_id_ex;

                        $bs_id_Path = public_path()."/assets/bureau/img/househelps/househelpkins/IDs/back";
                            $bs_id_img = Image::make($backside_id);
                            $bs_id_img ->save($bs_id_Path.'/'.$bs_id_name);
                        //end processing
                        $id_photo_back = $bs_id_name;
                    }

                if($user2){
                    $househelp = Househelp::find($bureau_househelp->id);
                    $househelp->househelpkins()->save($user2, [
                        'relationship_id'  => $request->househelpkin_relationship_id,
                        'gender_id'        => $request->househelpkin_gender_id,
                        'active'           => true,
                        'id_no'            => $request->househelpkin_id_no,
                        'photo'            => $photo,
                        'id_photo_front'   => $id_photo_front,
                        'id_photo_back'    => $id_photo_back,
                        'phone'            => $request->househelpkin_phone,
                        'address'          => $request->househelpkin_address,
                        'country_id'       => $request->househelpkin_country_id,
                        'county_id'        => $request->househelpkin_county_id,
                        'constituency_id'  => $request->househelpkin_constituency_id,
                        'ward_id'          => $request->househelpkin_ward_id,
                    ]);
                }
                $user2->save();
            }
            $user->save();
        }
    }

    public function show($id)
    {
        $househelp = Househelp:: with('country', 'county', 'constituency', 'ward',
                'gender', 'education', 'experience', 'tribe', 'skill','duration',
                'operation', 'englishstatus','maritalstatus','religion',
                'idstatus', 'healthstatus', 'househelpkins', 'user')

        // $househelp = User::with('bureauhousehelps', 'househelpkins')
                            ->find($id);
        return response()-> json([
            'househelp'=>$househelp,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $househelp = Househelp:: with('country', 'county', 'constituency', 'ward',
                                    'gender', 'education', 'experience', 'tribe', 'skill','duration',
                                    'operation', 'englishstatus','maritalstatus','religion','kid',
                                    'idstatus', 'healthstatus', 'househelpkins', 'user')
                            ->find($id);
        return response()-> json([
            'househelp'=>$househelp,
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $househelp = Househelp::find($id);

              //getting previous photo
                $currentPassport = $househelp->photo;
                // return $currentPassport;
                //processing photo nme and size
                if($request->photo != $currentPassport){
                    $ps_Path = public_path()."/assets/bureau/img/househelps/passports/";

                    $S_currentPassport = $ps_Path. $currentPassport;
                    //deleting if exists
                        if(file_exists($S_currentPassport)){
                            @unlink($S_currentPassport);
                        }
                        $passport = $request->photo;

                        $ps_strpos = strpos($passport, ';'); //positionof image name semicolon
                        $ps_sub = substr($passport, 0, $ps_strpos);
                        $ps_ex = explode('/', $ps_sub)[1];
                        $ps_name = time().".".$ps_ex;

                        $ps_img = Image::make($passport);
                        $ps_img ->save($ps_Path.'/'.$ps_name);
                    //end processing
                    $photo= $ps_name;
                }else{
                    $photo = $househelp->photo;
                }
                //passport photo

                //age
                if($request ->househelp_birth_date != null){
                    $date_of_birth = Carbon::parse($request->input('househelp_birth_date'));
                    $now = Carbon::now();
                    $househelp_date_of_birth = $date_of_birth->diffInYears($now);
                }else{
                    $househelp_date_of_birth = $househelp->age;
                }
                //age

                $househelp->update([
                'active'           => true,
                'employmentstatus' => false,
                'hiredstatus'      => false,

                'photo'            => $photo,

                'about_me'         => $request->househelp_about_me,
                'phone'            => $request->househelp_phone,
                'address'          => $request->househelp_address,
                'country_id'       => $request->househelp_country_id,
                'county_id'        => $request->househelp_county_id,
                'constituency_id'  => $request->househelp_constituency_id,
                'ward_id'          => $request->househelp_ward_id,

                    //attributes
                'age'            => $househelp_date_of_birth,
                'gender_id'      => $request->househelp_gender_id,
                'education_id'   => $request->househelp_education_id,
                'experience_id'  => $request->househelp_experience_id,
                'maritalstatus_id'=> $request->househelp_maritalstatus_id,
                'tribe_id'       => $request->househelp_tribe_id,
                'skill_id'       => $request->househelp_skill_id,
                'operation_id'   => $request->househelp_operation_id,
                'duration_id'    => $request->househelp_duration_id,
                'englishstatus_id'=> $request->househelp_englishstatus_id,
                'religion_id'    => $request->househelp_religion_id,
                'kid_id'         => $request->househelp_kid_id,
            ]);

            //update user if any details altered
            if($househelp){
                $user_id = $househelp->user_id;
                $user = User::find($user_id);
                $user->update([
                    'first_name' => $request->first_name,
                    'last_name'  => $request->last_name,
                    'email'      => $request->email,
                    'active'     => true,
                    'confirmed'  => true,
                    'confirmation_code' => md5(uniqid(mt_rand(), true)),
                    'user_type'      => 'Bureau Househelp',
                    'password'   => Hash::make($request->password),
                ]);
                $user->assignRole('Househelp');
            }
             //update user if any details altered

             if($househelp){
                 //id status
                 //front id photo
                 $currentFrontside_id = $househelp->idstatus()->first()->id_photo_front;
                 return $currentFrontside_id;
                //  ->id_photo_front;
                //processing id_photo_front nme and size
                if($request->id_photo_front != $currentFrontside_id){
                    $fr_id_Path = public_path()."/assets/bureau/img/househelps/IDs/front/";

                    $S_currentFrontside_id = $fr_id_Path. $currentFrontside_id;
                    // return $S_currentFrontside_id;
                    //deleting if exists
                        if(file_exists($S_currentFrontside_id)){
                            @unlink($S_currentFrontside_id);
                        }
                        $frontside_id = $request->id_photo_front;

                        $fr_id_strpos = strpos($frontside_id, ';');
                        $fr_id_sub = substr($frontside_id, 0, $fr_id_strpos);
                        $fr_id_ex = explode('/', $fr_id_sub)[1];
                        $fr_id_name = time().".".$fr_id_ex;

                        $fr_id_img = Image::make($frontside_id);
                        $fr_id_img ->save($fr_id_Path.'/'.$fr_id_name);
                     //end processing
                        $id_photo_front = $fr_id_name;
                }else{
                    $id_photo_front = $househelp->idstatus()->first()->id_photo_front;
                }
                //front id photo

                //back side id photo
                $currentBackside_id = $user->idstatus()->first()->id_photo_back;
                //processing id_photo_back nme and size
                if($request->id_photo_back != $currentBackside_id){
                    $bs_id_Path = public_path()."/assets/bureau/img/househelps/IDs/back/";

                    $S_currentBackside_id = $bs_id_Path. $currentBackside_id;
                    //deleting if exists
                        if(file_exists($S_currentBackside_id)){
                            @unlink($S_currentBackside_id);
                        }
                        $backside_id = $request->id_photo_back;

                        $bs_id_strpos = strpos($backside_id, ';');
                        $bs_id_sub = substr($backside_id, 0, $bs_id_strpos);
                        $bs_id_ex = explode('/', $bs_id_sub)[1];
                        $bs_id_name = time().".".$bs_id_ex;

                        $bs_id_img = Image::make($backside_id);
                        $bs_id_img ->save($bs_id_Path.'/'.$bs_id_name);
                     //end processing
                        $id_photo_back = $bs_id_name;
                }else{
                    $id_photo_back = $user->idstatus()->first()->id_photo_back;
                }
                //back side id photo
                //waiting card photo
                $currentWaiting_card = $househelp->idstatus()->first()->waiting_card_photo;

                $waiting_card = $request->waiting_card_photo;
                        if($waiting_card != null){
                            if($waiting_card != $currentWaiting_card){
                                $wc_photo_Path = public_path()."/assets/bureau/img/househelps/waitingcards/";

                                $wc_currentWaiting_card = $wc_photo_Path. $currentWaiting_card;
                                //deleting if exists
                                    if(file_exists($wc_currentWaiting_card)){
                                        @unlink($wc_currentWaiting_card);
                                    }
                                    //processing front side id imagee
                                    $wc_strpos = strpos($waiting_card, ';');
                                    $wc_sub = substr($waiting_card, 0, $wc_strpos);
                                    $wc_ex = explode('/', $wc_sub)[1];
                                    $wc_name = time().".".$wc_ex;

                                    $wc_img = Image::make($waiting_card);
                                    $wc_img ->save($wc_photo_Path.'/'.$wc_name);
                                    //end processing
                                $waiting_card_photo = $wc_name;
                            }
                        }else{
                            $waiting_card_photo = null;
                        }
                //waiting card photo
                 //id status
                 $idstatus_id = $request->idstatus_id;
                 $idstatus = IDstatus::find($idstatus)->update([
                    'status'              => $request ->id_status,
                    'reason'              => $request ->id_status_reason,
                    'id_number'           => $request ->id_number,
                    'id_photo_front'      => $id_photo_front,
                    'id_photo_back'       => $id_photo_back,
                    'waiting_card_photo'  => $waiting_card_photo,
                    'ref_number'          => $request ->ref_number,
                 ]);
                 //health status
                 $Healthstatu_id = $request->health_status_id;
                 $Healthstatus = Healthstatus::find($Healthstatu_id)->update([
                    'status'          => $request->status,
                    'HIV_status'      => $request->HIV_status,
                    'allergy'         => $request->allergy,
                    'specify'         => $request->specify,
                    'other_chronics'  => $request->other_chronics,
                    'chronic_details' => $request->chronic_details,
                 ]);
                 //health status
             }


               //front side id

            //    $currentFrontside_id = $househelp->idstatus()->first()->id_photo_front;
            //     // return $currentFrontside_id;
            //     //processing id_photo_front nme and size
            //     if($request->id_photo_front != $currentFrontside_id){
            //         $fr_id_Path = public_path()."/assets/bureau/img/househelps/IDs/front/";

            //         $S_currentFrontside_id = $fr_id_Path. $currentFrontside_id;
            //         // return $S_currentFrontside_id;
            //         //deleting if exists
            //             if(file_exists($S_currentFrontside_id)){
            //                 @unlink($S_currentFrontside_id);
            //             }
            //             $frontside_id = $request->id_photo_front;

            //             $fr_id_strpos = strpos($frontside_id, ';');
            //             $fr_id_sub = substr($frontside_id, 0, $fr_id_strpos);
            //             $fr_id_ex = explode('/', $fr_id_sub)[1];
            //             $fr_id_name = time().".".$fr_id_ex;

            //             $fr_id_img = Image::make($frontside_id);
            //             $fr_id_img ->save($fr_id_Path.'/'.$fr_id_name);
            //          //end processing
            //             $id_photo_front = $fr_id_name;
            //     }else{
            //         $id_photo_front = $user->idstatus()->first()->pivot->id_photo_front;
            //     }

                //backside id


            // if($user){
            //     DB::table('bureau_househelp')->where('user_id', $user->id)
            //     ->update([
            //         'active'           => true,
            //         'employmentstatus' => false,
            //         'hiredstatus'      => false,
            //         'photo'            => $photo,
            //         'about_me'         => $request->househelp_about_me,
            //         'phone'            => $request->househelp_phone,
            //         'address'          => $request->househelp_address,
            //         'country_id'       => $request->househelp_country_id,
            //         'county_id'        => $request->househelp_county_id,
            //         'constituency_id'  => $request->househelp_constituency_id,
            //         'ward_id'          => $request->househelp_ward_id,

            //             //attributes
            //         'age'            => $request->age,
            //         'gender_id'      => $request->househelp_gender_id,
            //         'education_id'   => $request->education_id,
            //         'experience_id'  => $request->experience_id,
            //         'maritalstatus_id'=> $request->maritalstatus_id,
            //         'tribe_id'       => $request->tribe_id,
            //         'skill_id'       => $request->skill_id,
            //         'operation_id'   => $request->operation_id,
            //         'duration_id'    => $request->duration_id,
            //         'englishstatus_id'=> $request->englishstatus_id,
            //         'religion_id'    => $request->religion_id,
            //         'kid_id'         => $request->kid_id,
            //     ]);

                // $househelp = $user->bureauhousehelps()->first();

            //     if($househelp){
            //         DB::table('idstatuses')->where('househelp_id', $househelp->id)
            //         ->update([
            //             'id_status'      => $request->id_status,
            //             'id_number'      => $request->id_number,
            //             'ref_number'     => $request->ref_number,
            //             'id_photo_front' => $id_photo_front,
            //             'id_photo_back'  => $id_photo_back,
            //         ]);
            //         //health status
            //     if($househelp){
            //         DB::table('healthstatuses')->where('househelp_id', $househelp->id)
            //         ->update([
            //             'health_status'  => $request->health_status,
            //             'specify'        => $request->specify,
            //         ]);
            //     }
            // }
        // }
        // $user->save();
    }


    public function destroy($id)
    {
        $user = User::find($id);
        if($user){

             $currentPassport = $user->bureauhousehelps()->first()->pivot->photo;
            //  ->photo;
                 $ps_Path = public_path()."/assets/bureau/img/househelps/passports/";
                 $S_currentPassport = $ps_Path. $currentPassport;
                     if(file_exists($S_currentPassport)){
                         @unlink($S_currentPassport);
                     }

            $househelp = Househelp::where('user_id', $user->id)->first();
            //front side id

            if($househelp){

                $idstatus = $househelp->idstatuses()->first();
                if($idstatus){
                    $currentFrontside_id = $househelp->idstatuses()->first()->id_photo_front;

                    if($currentFrontside_id !=null){
                        $fr_id_Path = public_path()."/assets/bureau/img/househelps/IDs/front/";
                        $S_currentFrontside_id = $fr_id_Path. $currentFrontside_id;
                        if(file_exists($S_currentFrontside_id)){
                            @unlink($S_currentFrontside_id);
                        }
                    }

                //backside id
                    $currentBackside_id = $househelp->idstatuses()->first()->id_photo_back;
                    if($currentBackside_id !=null){
                        $bs_id_Path = public_path()."/assets/bureau/img/househelps/IDs/back/";
                        $S_currentBackside_id = $bs_id_Path. $currentBackside_id;
                            if(file_exists($S_currentBackside_id)){
                                @unlink($S_currentBackside_id);
                            }
                    }
                    //wating card photo
                    $currentWaitingCard = $househelp->idstatuses()->first()->waiting_card_photo;
                    if($currentWaitingCard !=null){
                        $waitingcard_Path = public_path()."/assets/bureau/img/househelps/waitingcards/";
                        $S_currentWaitingCard = $waitingcard_Path. $currentWaitingCard;
                            if(file_exists($S_currentWaitingCard)){
                                @unlink($S_currentWaitingCard);
                            }
                    }
                   $idstatus->delete();
                }

                $healthstatus = $househelp->healthstatuses()->first();
                if($healthstatus != null){
                    $healthstatus->delete();
                }
                $househelpkin = $househelp->househelpkins()->first();
                    if($househelpkin != null){
                        $currentPassport = $househelpkin->pivot->photo;
                        $ps_Path = public_path()."/assets/bureau/img/househelps/househelpkins/passports/";
                        $S_currentPassport = $ps_Path. $currentPassport;
                            if(file_exists($S_currentPassport)){
                                @unlink($S_currentPassport);
                            }
                        $currentFrontside_id = $househelpkin->pivot->id_photo_front;
                        $fr_id_Path = public_path()."/assets/bureau/img/househelps/househelpkins/IDs/front/";
                        $S_currentFrontside_id = $fr_id_Path. $currentFrontside_id;
                            if(file_exists($S_currentFrontside_id)){
                                @unlink($S_currentFrontside_id);
                            }
                    //backside id
                        $currentBackside_id = $househelpkin->pivot->id_photo_back;
                        $bs_id_Path = public_path()."/assets/bureau/img/househelps/househelpkins/IDs/back/";
                        $S_currentBackside_id = $bs_id_Path. $currentBackside_id;
                            if(file_exists($S_currentBackside_id)){
                                @unlink($S_currentBackside_id);
                            }
                    }
                $househelpkin->delete();
                $userkin = User::find($househelpkin->user_id);
                $userkin->delete();
            }
            $househelp->delete();
        $user->delete();
        }
    }
}


