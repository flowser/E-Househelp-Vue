<?php

namespace App\Http\Controllers\Backend\Househelp;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Bureau\Bureau;
use App\Models\Standard\User;
use App\Models\Househelp\Househelp;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Models\Househelp\Standard\Idstatus;
use Fouladgar\EloquentBuilder\EloquentBuilder;
use App\Models\Househelp\Standard\Healthstatus;

class HousehelpController extends Controller
{
    public function index()
    {
          $househelps = Househelp::
                with('country', 'county', 'constituency', 'ward',
                'gender', 'education', 'experience', 'tribe', 'skill','duration',
                'operation', 'englishstatus','maritalstatus', 'religion', 'kid',
                'idstatus','healthstatus')//single has
                                       ->get();
                   return response()-> json([
                        'househelps' => $househelps,
                    ], 200);



    }
    // simple filtration
    public function gender($id)
    {
          $househelps = Househelp::
                with('country', 'county', 'constituency', 'ward',
                'gender', 'education', 'experience', 'tribe', 'skill','duration',
                'operation', 'englishstatus','maritalstatus', 'religion', 'kid',
                'idstatus','healthstatus')//single has
                ->where('gender_id',$id)
                                       ->get();
                   return response()-> json([
                        'househelps' => $househelps,
                    ], 200);
    }
    public function education($id)
    {
          $househelps = Househelp::
                with('country', 'county', 'constituency', 'ward',
                'gender', 'education', 'experience', 'tribe', 'skill','duration',
                'operation', 'englishstatus','maritalstatus', 'religion', 'kid',
                'idstatus','healthstatus')//single has
                ->where('education_id',$id)
                                       ->get();
                   return response()-> json([
                        'househelps' => $househelps,
                    ], 200);
    }
    public function duration($id)
    {
          $househelps = Househelp::
                with('country', 'county', 'constituency', 'ward',
                'gender', 'education', 'experience', 'tribe', 'skill','duration',
                'operation', 'englishstatus','maritalstatus', 'religion', 'kid',
                'idstatus','healthstatus')//single has
                ->where('duration_id',$id)
                                       ->get();
                   return response()-> json([
                        'househelps' => $househelps,
                    ], 200);
    }
    public function experience($id)
    {
          $househelps = Househelp::
                with('country', 'county', 'constituency', 'ward',
                'gender', 'education', 'experience', 'tribe', 'skill','duration',
                'operation', 'englishstatus','maritalstatus', 'religion', 'kid',
                'idstatus','healthstatus')//single has
                ->where('experience_id',$id)
                                       ->get();
                   return response()-> json([
                        'househelps' => $househelps,
                    ], 200);
    }
    public function maritalstatus($id)
    {
          $househelps = Househelp::
                with('country', 'county', 'constituency', 'ward',
                'gender', 'education', 'experience', 'tribe', 'skill','duration',
                'operation', 'englishstatus','maritalstatus', 'religion', 'kid',
                'idstatus','healthstatus')//single has
                ->where('maritalstatus_id',$id)
                                       ->get();
                   return response()-> json([
                        'househelps' => $househelps,
                    ], 200);
    }
    public function operation($id)
    {
          $househelps = Househelp::
                with('country', 'county', 'constituency', 'ward',
                'gender', 'education', 'experience', 'tribe', 'skill','duration',
                'operation', 'englishstatus','maritalstatus', 'religion', 'kid',
                'idstatus','healthstatus')//single has
                ->where('operation_id',$id)
                                       ->get();
                   return response()-> json([
                        'househelps' => $househelps,
                    ], 200);
    }
    public function skill($id)
    {
          $househelps = Househelp::
                with('country', 'county', 'constituency', 'ward',
                'gender', 'education', 'experience', 'tribe', 'skill','duration',
                'operation', 'englishstatus','maritalstatus', 'religion', 'kid',
                'idstatus','healthstatus')//single has
                ->where('skill_id',$id)
                                       ->get();
                   return response()-> json([
                        'househelps' => $househelps,
                    ], 200);
    }
    public function religion($id)
    {
          $househelps = Househelp::
                with('country', 'county', 'constituency', 'ward',
                'gender', 'education', 'experience', 'tribe', 'skill','duration',
                'operation', 'englishstatus','maritalstatus', 'religion', 'kid',
                'idstatus','healthstatus')//single has
                ->where('religion_id',$id)
                                       ->get();
                   return response()-> json([
                        'househelps' => $househelps,
                    ], 200);
    }
    public function tribe($id)
    {
          $househelps = Househelp::
                with('country', 'county', 'constituency', 'ward',
                'gender', 'education', 'experience', 'tribe', 'skill','duration',
                'operation', 'englishstatus','maritalstatus', 'religion', 'kid',
                'idstatus','healthstatus')//single has
                ->where('tribe_id',$id)
                                       ->get();
                   return response()-> json([
                        'househelps' => $househelps,
                    ], 200);
    }

    // simple filtration>

    // detailed filtration
    public function filter(Request $request)
    {        
        $househelps = Househelp::
                with('country', 'county', 'constituency', 'ward','gender', 'education', 'experience', 'tribe', 'skill','duration',
                     'operation', 'englishstatus','maritalstatus', 'religion', 'kid','idstatus','healthstatus')
                                ->filter($request)->get();
            return response()-> json([
                'househelps' => $househelps,
        ], 200);        
    }



    // detailed filtration
//for fresh store

    public function verifyDemographics (Request $request)
    {

        if($request->has('IDstatus') && $request['IDstatus'] == "HasID") {

            $request->validate([
                'househelp_first_name'  =>  'required',
                'househelp_last_name'  =>  'required',
                'email'  =>  'required|email|max:255|unique:users',
                'househelp_password'  =>  'required',
                'househelp_phone'  =>  'phone:AUTO,MOBILE',
                'househelp_landline'  =>  'phone:AUTO,MOBILE',
                'househelp_address'  =>  'required|digits_between:1,20',
                'househelp_birth_date'  =>  'required',
                'househelp_gender_id'  =>  'required',
                'househelp_country_id'  =>  'required',
                'househelp_county_id'  =>  'required',
                'househelp_constituency_id'  =>  'required',
                'househelp_ward_id'  =>  'required',
                'househelp_photo'  =>  'required',
                //default
                'househelp_id_status'       =>'required',
                'househelp_id_status_reason'=>'required',
                //condition
                'househelp_id_number'      =>  'required|digits_between:7,10',
                'househelp_id_photo_front' =>'required',
                'househelp_id_photo_back'  =>'required',
           ]);
        }elseif($request->has('IDstatus') && $request['IDstatus'] == "HASIDbutlost"){
            $request->validate([
                'househelp_first_name'  =>  'required',
                'househelp_last_name'  =>  'required',
                'email'  =>  'required|email|max:255|unique:users',
                'househelp_password'  =>  'required',
                'househelp_phone'  =>  'phone:AUTO,MOBILE',
                'househelp_landline'  =>  'phone:AUTO,MOBILE',
                'househelp_address'  =>  'required|digits_between:1,20',
                'househelp_birth_date'  =>  'required',
                'househelp_gender_id'  =>  'required',
                'househelp_country_id'  =>  'required',
                'househelp_county_id'  =>  'required',
                'househelp_constituency_id'  =>  'required',
                'househelp_ward_id'  =>  'required',
                'househelp_photo'  =>  'required',
                //default
                'househelp_id_status'       =>'required',
                'househelp_id_status_reason'=>'required',
                //condition
                'househelp_id_number'      =>  'required|digits_between:7,10',
                'househelp_waiting_card_photo'=>'required',
           ]);
        }elseif($request->has('IDstatus') && $request['IDstatus'] == "NOIDbutapplied"){
            $request->validate([
                'househelp_first_name'  =>  'required',
                'househelp_last_name'  =>  'required',
                'email'  =>  'required|email|max:255|unique:users',
                'househelp_password'  =>  'required',
                'househelp_phone'  =>  'phone:AUTO,MOBILE',
                'househelp_landline'  =>  'phone:AUTO,MOBILE',
                'househelp_address'  =>  'required|digits_between:1,20',
                'househelp_birth_date'  =>  'required',
                'househelp_gender_id'  =>  'required',
                'househelp_country_id'  =>  'required',
                'househelp_county_id'  =>  'required',
                'househelp_constituency_id'  =>  'required',
                'househelp_ward_id'  =>  'required',
                'househelp_photo'  =>  'required',
                //default
                'househelp_id_status'       =>'required',
                'househelp_id_status_reason'=>'required',
                //condition
                'househelp_ref_number'      =>'required',
                'househelp_waiting_card_photo'=>'required',
           ]);
        }elseif($request->has('IDstatus') && $request['IDstatus'] == "NOID"){
            $request->validate([
                'househelp_first_name'  =>  'required',
                'househelp_last_name'  =>  'required',
                'email'  =>  'required|email|max:255|unique:users',
                'househelp_password'  =>  'required',
                'househelp_phone'  =>  'phone:AUTO,MOBILE',
                'househelp_landline'  =>  'phone:AUTO,MOBILE',
                'househelp_address'  =>  'required|digits_between:1,20',
                'househelp_birth_date'  =>  'required',
                'househelp_gender_id'  =>  'required',
                'househelp_country_id'  =>  'required',
                'househelp_county_id'  =>  'required',
                'househelp_constituency_id'  =>  'required',
                'househelp_ward_id'  =>  'required',
                'househelp_photo'  =>  'required',
                //default
                'househelp_id_status'       =>'required',
                'househelp_id_status_reason'=>'required',
                //condition no checking id here
                // 'househelp_ref_number'      =>'required',
                // 'househelp_waiting_card_photo'=>'required',
           ]);
        }
    }
    public function verifyAttributes (Request $request)
    {
        // return $request;

        if($request->has('HealthStatus') && $request['HealthStatus'] == "HEALTHY") {
                $request->validate([
                    'househelp_education_id'        => 'required',
                    'househelp_experience_id'       => 'required',
                    'househelp_maritalstatus_id'    => 'required',
                    'househelp_tribe_id'            => 'required',
                    'househelp_skill_id'            => 'required',
                    'househelp_operation_id'        => 'required',
                    'househelp_duration_id'         => 'required',
                    'househelp_englishstatus_id'    => 'required',
                    'househelp_religion_id'         => 'required',
                    'househelp_kid_id'              => 'required',
                    //CONDITION
                    'status'                        => 'required',
                    'HIV_status'                    => 'required',

                ]);
        }elseif($request->has('HealthStatus') && $request['HealthStatus'] == "HASMINOR"){
                 $request->validate([
                    'househelp_education_id'        => 'required',
                    'househelp_experience_id'       => 'required',
                    'househelp_maritalstatus_id'    => 'required',
                    'househelp_tribe_id'            => 'required',
                    'househelp_skill_id'            => 'required',
                    'househelp_operation_id'        => 'required',
                    'househelp_duration_id'         => 'required',
                    'househelp_englishstatus_id'    => 'required',
                    'househelp_religion_id'         => 'required',
                    'househelp_kid_id'              => 'required',
                    //CONDITION
                    'HIV_status'                    => 'required',
                    'allergy'                       => 'required',
                    'specify'                       => 'required',

                ]);
        }elseif($request->has('HealthStatus') && $request['HealthStatus'] == "HASCHRONIC"){
                $request->validate([
                    'househelp_education_id'        => 'required',
                    'househelp_experience_id'       => 'required',
                    'househelp_maritalstatus_id'    => 'required',
                    'househelp_tribe_id'            => 'required',
                    'househelp_skill_id'            => 'required',
                    'househelp_operation_id'        => 'required',
                    'househelp_duration_id'         => 'required',
                    'househelp_englishstatus_id'    => 'required',
                    'househelp_religion_id'         => 'required',
                    'househelp_kid_id'              => 'required',
                    //CONDITION
                    'HIV_status'                    => 'required',
                    'other_chronics'                => 'required',
                    'chronic_details'               => 'required',
                ]);
        }
    }

    public function verifyKin (Request $request)
    {
        $this->validate($request,[
                'househelpkin_first_name'  =>  'required',
                'househelpkin_last_name'  =>  'required',
                // 'email'  =>  'required|email|max:255|unique:users',
                // 'password'  =>  'required',
                'househelpkin_phone'  =>  'phone:AUTO,MOBILE',
                'househelpkin_id_no'  =>  'required|digits_between:7,10',
                'househelpkin_address'  =>  'required|digits_between:1,20',
                'househelpkin_relationship_id'  =>  'required',
                'househelpkin_gender_id'  =>  'required',
                'househelpkin_country_id'  =>  'required',
                'househelpkin_county_id'  =>  'required',
                'househelpkin_constituency_id'  =>  'required',
                'househelpkin_ward_id'  =>  'required',
                'househelpkin_photo'  =>  'required',
                'househelpkin_id_photo_front'  =>  'required',
                'househelpkin_id_photo_back'  =>  'required',
       ]);
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
            $user->save();
            if($user){
                $hs_passport = $request->househelp_photo;
                if($hs_passport){
                     //processing passport name
                     $hs_ps_strpos = strpos($hs_passport, ';'); //positionof image name semicolon
                     $hs_ps_sub = substr($hs_passport, 0, $hs_ps_strpos);
                     $hs_ps_ex = explode('/', $hs_ps_sub)[1];
                     $hs_ps_name = time().".".$hs_ps_ex;

                     $hs_ps_Path = public_path()."/assets/bureau/img/househelps/passports";
                         $hs_ps_img = Image::make($hs_passport);
                         $hs_ps_img ->save($hs_ps_Path.'/'.$hs_ps_name);
                     //end processing
                    $hs_photo= $hs_ps_name;
                }

                // demographic

                $househelp = new Househelp();
                $househelp ->user_id            = $user->id;
                $househelp ->bureau_id          = $bureau->id;
                $househelp ->active             = true;
                $househelp ->employmentstatus   = false;
                $househelp ->hiredstatus        = false;
                $househelp ->photo              = $hs_photo;
                $househelp ->about_me           = $request->househelp_about_me;
                $househelp ->phone              = $request->househelp_phone;
                $househelp ->address            = $request->househelp_address;
                $househelp ->country_id         = $request->househelp_country_id;
                $househelp ->county_id          = $request->househelp_county_id;
                $househelp ->constituency_id    = $request->househelp_constituency_id;
                $househelp ->ward_id            = $request->househelp_ward_id;

                //attributes
                //age calculation
                $date_of_birth = Carbon::parse($request->input('househelp_birth_date'));
                $now = Carbon::now();
                $househelp_date_of_birth = $date_of_birth->diffInYears($now);
                //age calculation
                $househelp ->age              = $househelp_date_of_birth;

                $househelp ->gender_id        = $request->househelp_gender_id;
                $househelp ->education_id     = $request->househelp_education_id;
                $househelp ->experience_id    = $request->househelp_experience_id;
                $househelp ->maritalstatus_id  = $request->househelp_maritalstatus_id;
                $househelp ->tribe_id         = $request->househelp_tribe_id;
                $househelp ->skill_id         = $request->househelp_skill_id;
                $househelp ->operation_id     = $request->househelp_operation_id;
                $househelp ->duration_id      = $request->househelp_duration_id;
                $househelp ->englishstatus_id  = $request->househelp_englishstatus_id;
                $househelp ->religion_id      = $request->househelp_religion_id;
                $househelp ->kid_id           = $request->househelp_kid_id;
                $househelp->save();

                if($househelp){
                     //id status
                      //househelp Front side id image
                      $hs_frontside_id = $request->househelp_id_photo_front;
                      if($hs_frontside_id != null){
                          //processing front side id imagee
                          $hs_fr_id_strpos = strpos($hs_frontside_id, ';');
                          $hs_fr_id_sub = substr($hs_frontside_id, 0, $hs_fr_id_strpos);
                          $hs_fr_id_ex = explode('/', $hs_fr_id_sub)[1];
                          $hs_fr_id_name = time().".".$hs_fr_id_ex;
                          $hs_fr_id_Path = public_path()."/assets/bureau/img/househelps/IDs/front";
                              $hs_fr_id_img = Image::make($hs_frontside_id);
                              $hs_fr_id_img ->save($hs_fr_id_Path.'/'.$hs_fr_id_name);
                          //end processing
                          $hs_id_photo_front = $hs_fr_id_name;
                      }else{
                          $hs_id_photo_front = null;
                      }
                      $hs_backside_id = $request->househelp_id_photo_back;
                      if($hs_backside_id != null){
                          //processing front side id imagee
                          $hs_bs_id_strpos = strpos($hs_backside_id, ';');
                          $hs_bs_id_sub = substr($hs_backside_id, 0, $hs_bs_id_strpos);
                          $hs_bs_id_ex = explode('/', $hs_bs_id_sub)[1];
                          $hs_bs_id_name = time().".".$hs_bs_id_ex;
                          $hs_bs_id_Path = public_path()."/assets/bureau/img/househelps/IDs/back";
                              $hs_bs_id_img = Image::make($hs_backside_id);
                              $hs_bs_id_img ->save($hs_bs_id_Path.'/'.$hs_bs_id_name);
                          //end processing
                          $hs_id_photo_back = $hs_bs_id_name;
                      }else{
                          $hs_id_photo_back = null;
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
                      $Idstatus->bureau_househelp_id  = $househelp->id ;
                      $Idstatus ->status              = $request ->househelp_id_status;
                      $Idstatus ->reason              = $request ->househelp_id_status_reason;
                      $Idstatus ->id_number           = $request ->househelp_id_number;
                      $Idstatus ->id_photo_front      = $hs_id_photo_front;
                      $Idstatus ->id_photo_back       = $hs_id_photo_back;
                      $Idstatus ->waiting_card_photo  = $waiting_card_photo;
                      $Idstatus ->ref_number          = $request ->househelp_ref_number;
                      $Idstatus->save();
                      //health status
                      $Healthstatus = new Healthstatus();
                      $Healthstatus->bureau_househelp_id  = $househelp->id;
                      $Healthstatus->status          = $request->status;
                      $Healthstatus->HIV_status      = $request->HIV_status;
                      $Healthstatus->allergy         = $request->allergy;
                      $Healthstatus->specify         = $request->specify;
                      $Healthstatus->other_chronics  = $request->other_chronics;
                      $Healthstatus->chronic_details = $request->chronic_details;
                      $Healthstatus->save();

                      //househelp kin
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
                      $user2->save();

                      if($user2){
                        $hk_passport = $request->househelpkin_photo;
                        if($hk_passport){
                            //processing passport name
                            $hk_ps_strpos = strpos($hk_passport, ';'); //positionof image name semicolon
                            $hk_ps_sub = substr($hk_passport, 0, $hk_ps_strpos);
                            $hk_ps_ex = explode('/', $hk_ps_sub)[1];
                            $hk_ps_name = time().".".$hk_ps_ex;

                            $hk_ps_Path = public_path()."/assets/bureau/img/househelps/househelpkins/passports";
                                $hk_ps_img = Image::make($hk_passport);
                                $hk_ps_img ->save($hk_ps_Path.'/'.$hk_ps_name);
                            //end processing
                            $hk_photo= $hk_ps_name;
                        }
                        //househelp Front side id image
                        $hk_frontside_id = $request->househelpkin_id_photo_front;
                        if($hk_frontside_id){
                            //processing front side id imagee
                            $hk_fr_id_strpos = strpos($hk_frontside_id, ';');
                            $hk_fr_id_sub = substr($hk_frontside_id, 0, $hk_fr_id_strpos);
                            $hk_fr_id_ex = explode('/', $hk_fr_id_sub)[1];
                            $hk_fr_id_name = time().".".$hk_fr_id_ex;

                            $hk_fr_id_Path = public_path()."/assets/bureau/img/househelps/househelpkins/IDs/front";
                                $hk_fr_id_img = Image::make($hk_frontside_id);
                                $hk_fr_id_img ->save($hk_fr_id_Path.'/'.$hk_fr_id_name);
                            //end processing
                            $hk_id_photo_front = $hk_fr_id_name;
                        }
                        $hk_backside_id = $request->househelpkin_id_photo_back;
                        if($hk_backside_id){
                            //processing front side id imagee
                            $hk_bs_id_strpos = strpos($hk_backside_id, ';');
                            $hk_bs_id_sub = substr($hk_backside_id, 0, $hk_bs_id_strpos);
                            $hk_bs_id_ex = explode('/', $hk_bs_id_sub)[1];
                            $hk_bs_id_name = time().".".$hk_bs_id_ex;

                            $hk_bs_id_Path = public_path()."/assets/bureau/img/househelps/househelpkins/IDs/back";
                                $hk_bs_id_img = Image::make($hk_backside_id);
                                $hk_bs_id_img ->save($hk_bs_id_Path.'/'.$hk_bs_id_name);
                            //end processing
                            $hk_id_photo_back = $hk_bs_id_name;
                        }
                            $househelp->househelpkins()->save($user2, [
                            'relationship_id'  => $request->househelpkin_relationship_id,
                            'gender_id'        => $request->househelpkin_gender_id,
                            'active'           => true,
                            'id_no'            => $request->househelpkin_id_no,
                            'photo'            => $hk_photo,
                            'id_photo_front'   => $hk_id_photo_front,
                            'id_photo_back'    => $hk_id_photo_back,
                            'phone'            => $request->househelpkin_phone,
                            'address'          => $request->househelpkin_address,
                            'country_id'       => $request->househelpkin_country_id,
                            'county_id'        => $request->househelpkin_county_id,
                            'constituency_id'  => $request->househelpkin_constituency_id,
                            'ward_id'          => $request->househelpkin_ward_id,
                           ]);
                      }
                }
            }
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
        // return $request;
        $user = User::find($request->user_id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->active     = true;
            $user->confirmed  = true;
            $user->confirmation_code = md5(uniqid(mt_rand(), true));
            $user->user_type      = 'Househelp';
            $user->password   = Hash::make($request->password);
        $user->assignRole('Househelp');
        $user->save();

        if($user){

        }

        $househelp = Househelp::find($id);

       //passport
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
        // demographic
            $househelp ->photo              = $photo;
            $househelp ->about_me           = $request->about_me;
            $househelp ->phone              = $request->phone;
            $househelp ->address            = $request->address;
            $househelp ->country_id         = $request->country_id;
            $househelp ->county_id          = $request->county_id;
            $househelp ->constituency_id    = $request->constituency_id;
            $househelp ->ward_id            = $request->ward_id;

            //attributes
            //age
            if($request ->birth_date != null){
                $date_of_birth = Carbon::parse($request->input('birth_date'));
                $now = Carbon::now();
                $househelp_date_of_birth = $date_of_birth->diffInYears($now);
            }else{
                $househelp_date_of_birth = $househelp->age;
            }
            //age
            $househelp ->age              = $househelp_date_of_birth;

            $househelp ->gender_id        = $request->gender_id;
            $househelp ->education_id     = $request->education_id;
            $househelp ->experience_id    = $request->experience_id;
            $househelp ->maritalstatus_id = $request->maritalstatus_id;
            $househelp ->tribe_id         = $request->tribe_id;
            $househelp ->skill_id         = $request->skill_id;
            $househelp ->operation_id     = $request->operation_id;
            $househelp ->duration_id      = $request->duration_id;
            $househelp ->englishstatus_id = $request->englishstatus_id;
            $househelp ->religion_id      = $request->religion_id;
            $househelp ->kid_id           = $request->kid_id;

        $househelp->save();
        if($househelp){


        }

        //idstatus
        $Idstatus = Idstatus::find($request->idstatus_id);
            // front side id
             $currentFrontside_id = $Idstatus->id_photo_front;
                if($request->id_photo_front != $currentFrontside_id){
                    $fr_id_Path = public_path()."/assets/bureau/img/househelps/IDs/front/";

                    $S_currentFrontside_id = $fr_id_Path. $currentFrontside_id;

                    if($S_currentFrontside_id !=null){
                        if(file_exists($S_currentFrontside_id)){
                            @unlink($S_currentFrontside_id);
                        }
                         //deleting if exists
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
                    $id_photo_front = $Idstatus->id_photo_front;
                }

             // front side id
             //backside id
             $currentBackside_id = $Idstatus->id_photo_back;
                if($request->id_photo_back != $currentBackside_id){
                    $bs_id_Path = public_path()."/assets/bureau/img/househelps/IDs/back/";

                    $S_currentBackside_id = $bs_id_Path. $currentBackside_id;
                    if($S_currentBackside_id !=null){
                        if(file_exists($S_currentBackside_id)){
                            @unlink($S_currentBackside_id);
                        }
                        //deleting if exists
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
                    $id_photo_back = $Idstatus->id_photo_back;
                }
             //backside id
             //waiting card photo
             $currentWaiting_card = $Idstatus->waiting_card_photo;
                if($request->waiting_card_photo != $currentWaiting_card){
                    $wc_photo_Path = public_path()."/assets/bureau/img/househelps/waitingcards/";

                    $wc_currentWaiting_card = $wc_photo_Path. $currentWaiting_card;
                    if($wc_currentWaiting_card !=null){
                        if(file_exists($wc_currentWaiting_card)){
                            @unlink($wc_currentWaiting_card);
                        }
                         //deleting if exists
                    }
                        $wc_strpos = strpos($waiting_card, ';');
                        $wc_sub = substr($waiting_card, 0, $wc_strpos);
                        $wc_ex = explode('/', $wc_sub)[1];
                        $wc_name = time().".".$wc_ex;

                        $wc_img = Image::make($waiting_card);
                        $wc_img ->save($wc_photo_Path.'/'.$wc_name);
                        //end processing
                    $waiting_card_photo = $wc_name;
                }else{
                    $waiting_card_photo = $Idstatus->waiting_card_photo;
                }
             //waiting card photo

             $Idstatus->bureau_househelp_id  = $househelp->id ;
             $Idstatus ->status              = $request ->id_status;
             $Idstatus ->reason              = $request ->id_status_reason;
             $Idstatus ->id_number           = $request ->id_number;
             $Idstatus ->id_photo_front      = $id_photo_front;
             $Idstatus ->id_photo_back       = $id_photo_back;
             $Idstatus ->waiting_card_photo  = $waiting_card_photo;
             $Idstatus ->ref_number          = $request ->ref_number;
        $Idstatus->save();
        //idstatus

        //health status
        $Healthstatus = Healthstatus::find($request->health_status_id);
            $Healthstatus->bureau_househelp_id  = $househelp->id;
            $Healthstatus->status          = $request->status;
            $Healthstatus->HIV_status      = $request->HIV_status;
            $Healthstatus->allergy         = $request->allergy;
            $Healthstatus->specify         = $request->specify;
            $Healthstatus->other_chronics  = $request->other_chronics;
            $Healthstatus->chronic_details = $request->chronic_details;
        $Healthstatus->save();
                 //health status
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


