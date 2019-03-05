<?php

namespace App\Http\Controllers\Backend\Househelp;

use Illuminate\Http\Request;
use App\Models\Standard\User;
use App\Models\Standard\Gender;
use App\Models\Standard\Position;
use App\Models\Househelp\Househelp;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Models\Organisation\Organisation;
use App\Models\Househelp\HousehelpDirector;
use App\Models\Househelp\Standard\Idstatus;
use Propaganistas\LaravelPhone\PhoneNumber;


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
            }elseif(auth()->user()->hasRole('Bureau Director', 'Bureau Superadmin','Bureau Admin','Bureau Employee')){

                // $bureaudirector = Auth::user()->bureaudirectors()->first();
                // $bureauadmin = Auth::user()->bureauadmins()->first();
                // $bureauemployee = Auth::user()->bureauemployees()->first();

                $househelps = Househelp:: with('country', 'county', 'constituency', 'ward',
                'genders', 'education', 'experiences', 'tribes', 'skills','durations',
                'operations', 'englishstatuses','maritalstatuses','locations', 'religions',
                '_i_dstatus','healthstatus')//single has
                                       ->get();
                   return response()-> json([
                        'househelps' => $househelps,
                    ], 200);
            }else{

            }
        }

    }


    public function verifyDemographics (Request $request)
    {
        $this->validate($request,[

       ]);
    }
    public function verifyAttributes (Request $request)
    {
        $this->validate($request,[

       ]);
    }
    public function verifyKin (Request $request)
    {
        $this->validate($request,[

       ]);
    }

    public function store(Request $request, $id)
    {
        $bureau= Bureau::find($id);
        if ($bureau){
            $user = new User();
            $user->first_name = $request->househelp_first_name;
            $user->last_name = $request->househelp_last_name;
            $user->email = $request->househelp_email;
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


                //id status
                //househelp Front side id image
                $frontside_id = $request->househelp_id_photo_front;
                if($frontside_id){
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
                }
                $backside_id = $request->househelp_id_photo_back;
                if($backside_id){
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
                }

            if($user){
                $househelp = $bureau->bureauhousehelps()->save($user, [
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
                        'age'            => $request->age,
                        'gender_id'      => $request->househelp_gender_id,
                        'education_id'   => $request->education_id,
                        'experience_id'  => $request->experience_id,
                        'maritalstatus_id'=> $request->maritalstatus_id,
                        'tribe_id'       => $request->tribe_id,
                        'skill_id'       => $request->skill_id,
                        'operation_id'   => $request->operation_id,
                        'duration_id'    => $request->duration_id,
                        'englishstatus_id'=> $request->englishstatus_id,
                        'religion_id'    => $request->religion_id,
                        'kid_id'         => $request->kid_id,
                    ]);

                    if($househelp){
                        $Idstatus = new Idstatus();
                        $Idstatus->househelp_id   = $househelp->id ;
                        $Idstatus->id_status      = $request->id_status;
                        $Idstatus->id_number      = $request->id_number;
                        $Idstatus->ref_number     = $request->ref_number;
                        $Idstatus->id_photo_front = $id_photo_front;
                        $Idstatus->id_photo_back  = $id_photo_back;
                        $Idstatus->save();

                        //health status
                        $Healthstatus = new Healthstatus();
                        $Healthstatus->househelp_id  = $househelp->id ;
                        $Healthstatus->health_status  = $request->health_status;
                        $Healthstatus->specify        = $request->specify;
                        $Healthstatus->save();
                    }
            }
            if($user){//adding kin
                $user2 = new User();
                $user2->first_name = $request->first_name;
                $user2->last_name  = $request->last_name;
                $user2->email      = $request->email;
                $user2->active     = true;
                $user2->confirmed  = true;
                $user2->confirmation_code = md5(uniqid(mt_rand(), true));
                $user2->user_type      = 'Househelp Kin';
                $user2->password   = Hash::make($request->password);

                $user2->assignRole('Househelp Kin');

                    $passport = $request->househelpkin_photo;
                    if($passport){
                        //processing passport name
                        $ps_strpos = strpos($passport, ';'); //positionof image name semicolon
                        $ps_sub = substr($passport, 0, $ps_strpos);
                        $ps_ex = explode('/', $ps_sub)[1];
                        $ps_name = time().".".$ps_ex;

                        $ps_Path = public_path()."/assets/bureau/img/househelpkins/passports";
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

                        $fr_id_Path = public_path()."/assets/bureau/img/househelpkins/IDs/front";
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

                        $bs_id_Path = public_path()."/assets/bureau/img/househelpkins/IDs/back";
                            $bs_id_img = Image::make($backside_id);
                            $bs_id_img ->save($bs_id_Path.'/'.$bs_id_name);
                        //end processing
                        $id_photo_back = $bs_id_name;
                    }

                if($user2){
                    $househelp->bureauhousehelpkins()->save($user2, [
                        'gender_id'        => $request->househelpkin_gender_id,
                        'active'           => true,
                        'id_no'            => $request-> $request->househelpkin_id_no,
                        'photo'            => $photo,
                        'id_photo_front'   => $id_photo_front,
                        'id_photo_back'    => $id_photo_back,
                        'phone'            => $request-> $request->househelpkin_phone,
                        'address'          => $request-> $request->househelpkin_address,
                        'country_id'       => $request-> $request->househelpkin_country_id,
                        'county_id'        => $request-> $request->househelpkin_county_id,
                        'constituency_id'  => $request-> $request->househelpkin_constituency_id,
                        'ward_id'          => $request-> $request->househelpkin_ward_id,
                    ]);
                }
                $user2->save();
            }
            $user->save();
        }
    }

    public function show($id)
    {
        $househelp = User::with('bureauhousehelps', 'bureauhousehelpkins')
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

        $househelp = User::with('bureauhousehelps')
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
        $this->validate($request,[
            'first_name'  =>  'required',
            'last_name'  =>  'required',
            'email'  =>  'required|email|max:255|unique:users',
            'email'  =>  'required|email|max:255|unique:users,email,'.$id,
            'password'  =>  'sometimes|required',
            'phone'  =>  'phone:AUTO,MOBILE',
            'landline'  =>  'phone:AUTO,MOBILE',
            'id_no'  =>  'required|digits_between:7,10',
            'address'  =>  'required|digits_between:1,20',
            // 'gender_id'  =>  'required',
            'country_id'  =>  'required',
            'county_id'  =>  'required',
            'constituency_id'  =>  'required',
            'ward_id'  =>  'required',
            // 'photo'  =>  'sometimes|required',
            // 'id_photo_front'  =>  'sometimes|required',
            // 'id_photo_back'  =>  'sometimes|required',
       ]);

        //geting organistion id
        // return $id;

            $user = User::find($id);
            $user->first_name = $request->first_name;
            $user->last_name  = $request->last_name;
            $user->email      = $request->email;
            $user->active     = true;
            $user->confirmed  = true;
            $user->confirmation_code = md5(uniqid(mt_rand(), true));
            $user->user_type      = 'Bureau Househelp';
            $user->password   = Hash::make($request->password);
            // $user->save();

            $user->assignRole('Househelp');

                //getting previous photo
                $currentPassport = $user->bureauhousehelps()->first()->pivot->photo;
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
                    $photo = $user->bureauhousehelps()->first()->pivot->photo;
                }
               //front side id

               $currentFrontside_id = $user->idstatus()->first()->pivot->id_photo_front;
                // return $currentFrontside_id;
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
                    $id_photo_front = $user->idstatus()->first()->pivot->id_photo_front;
                }

                //backside id
                $currentBackside_id = $user->idstatus()->first()->pivot->id_photo_back;
                // return $currentBackside_id;
                //processing id_photo_back nme and size
                if($request->id_photo_back != $currentBackside_id){
                    $bs_id_Path = public_path()."/assets/bureau/img/househelps/IDs/back/";

                    $S_currentBackside_id = $bs_id_Path. $currentBackside_id;
                    // return $S_currentBackside_id;
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
                    $id_photo_back = $user->idstatus()->first()->pivot->id_photo_back;
                }

            if($user){
                DB::table('bureau_househelp')->where('user_id', $user->id)
                ->update([
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
                    'age'            => $request->age,
                    'gender_id'      => $request->househelp_gender_id,
                    'education_id'   => $request->education_id,
                    'experience_id'  => $request->experience_id,
                    'maritalstatus_id'=> $request->maritalstatus_id,
                    'tribe_id'       => $request->tribe_id,
                    'skill_id'       => $request->skill_id,
                    'operation_id'   => $request->operation_id,
                    'duration_id'    => $request->duration_id,
                    'englishstatus_id'=> $request->englishstatus_id,
                    'religion_id'    => $request->religion_id,
                    'kid_id'         => $request->kid_id,
                ]);

                $househelp = $user->bureauhousehelps()->first();

                if($househelp){
                    DB::table('idstatuses')->where('househelp_id', $househelp->id)
                    ->update([
                        'id_status'      => $request->id_status,
                        'id_number'      => $request->id_number,
                        'ref_number'     => $request->ref_number,
                        'id_photo_front' => $id_photo_front,
                        'id_photo_back'  => $id_photo_back,
                    ]);
                    //health status
                if($househelp){
                    DB::table('healthstatuses')->where('househelp_id', $househelp->id)
                    ->update([
                        'health_status'  => $request->health_status,
                        'specify'        => $request->specify,
                    ]);
                }
            }
        }
        $user->save();
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user){
             $currentPassport = $user->bureauhousehelps()->first()->pivot->photo;
                 $ps_Path = public_path()."/assets/bureau/img/househelps/passports/";
                 $S_currentPassport = $ps_Path. $currentPassport;
                     if(file_exists($S_currentPassport)){
                         @unlink($S_currentPassport);
                     }

            $househelp = $user->bureauhousehelps()->first();
            //front side id

            if($househelp){

                $idstatus = $househelp->idstatus()->first();
                if($idstatus){
                    $currentFrontside_id = $househelp->idstatus()->first()->pivot->id_photo_front;
                    $fr_id_Path = public_path()."/assets/bureau/img/househelps/IDs/front/";
                    $S_currentFrontside_id = $fr_id_Path. $currentFrontside_id;
                        if(file_exists($S_currentFrontside_id)){
                            @unlink($S_currentFrontside_id);
                        }

                //backside id
                    $currentBackside_id = $househelp->idstatus()->first()->pivot->id_photo_back;
                    $bs_id_Path = public_path()."/assets/bureau/img/househelps/IDs/back/";
                    $S_currentBackside_id = $bs_id_Path. $currentBackside_id;
                        if(file_exists($S_currentBackside_id)){
                            @unlink($S_currentBackside_id);
                        }
                   $idstatus->delete();
                }

                $healthstatus = $househelp->healthstatus()->first();
                if($healthstatus){
                    $healthstatus->delete();
                }

                $househelpkin = $househelp->househelpkin()->first();

                if($househelpkin){
                    $currentPassport = $househelp->househelpkin()->first()->pivot->photo;
                    $ps_Path = public_path()."/assets/bureau/img/househelps/househelpkins/passports/";
                    $S_currentPassport = $ps_Path. $currentPassport;
                        if(file_exists($S_currentPassport)){
                            @unlink($S_currentPassport);
                        }
                    $currentFrontside_id = $househelp->idstatus()->first()->pivot->id_photo_front;
                    $fr_id_Path = public_path()."/assets/bureau/img/househelps/househelpkins/IDs/front/";
                    $S_currentFrontside_id = $fr_id_Path. $currentFrontside_id;
                        if(file_exists($S_currentFrontside_id)){
                            @unlink($S_currentFrontside_id);
                        }
                //backside id
                    $currentBackside_id = $househelp->idstatus()->first()->pivot->id_photo_back;
                    $bs_id_Path = public_path()."/assets/bureau/img/househelps/househelpkins/IDs/back/";
                    $S_currentBackside_id = $bs_id_Path. $currentBackside_id;
                        if(file_exists($S_currentBackside_id)){
                            @unlink($S_currentBackside_id);
                        }
                    $househelp->househelpkin()->delete();
                }
                    $househelpkin->user()->delete();
            }
            $user->bureauhousehelps()->detach($id);
        $user->delete();
        }
    }
}


