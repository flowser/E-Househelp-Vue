<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bureau\Bureau;
use App\Models\Standard\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Organisation\Organisation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Organisation

        if (auth()->check()) {
            if (auth()->user()->hasRole('Organisation Director')) {
                $logged_user =User::
                            leftJoin('organisation_director', 'organisation_director.user_id', '=', 'users.id')
                            ->leftJoin('positions', 'organisation_director.position_id', '=', 'positions.id')
                            ->leftJoin('countries', 'organisation_director.country_id', '=', 'countries.id')
                            ->leftJoin('counties', 'organisation_director.county_id', '=', 'counties.id')
                            ->leftJoin('constituencies', 'organisation_director.constituency_id', '=', 'constituencies.id')
                            ->leftJoin('wards', 'organisation_director.ward_id', '=', 'wards.id')
                            ->where('users.id', Auth::user()->id)
                            ->select('users.*',
                                'organisation_director.*',
                                    'countries.name as country_name',
                                    'counties.name as county_name',
                                    'constituencies.name as constituency_name',
                                    'wards.name as ward_name',
                                    'positions.name as position_name'
                            )->first();
                            // return Auth::user()->id;
                            // return $logged_user;
        $organisation = Organisation::with('about','services', 'servicemodels', 'adverts', 'features',
                               'organisationdirectors', 'organisationadmins', 'organisationemployees')
                               ->first();

                  return view('admin.adminmaster', compact("logged_user", "organisation"));
            }
            elseif (auth()->user()->hasRole('Organisation Superadmin')) {
                $logged_user =User::
                            leftJoin('organisation_admin', 'organisation_admin.user_id', '=', 'users.id')
                            ->leftJoin('positions', 'organisation_admin.position_id', '=', 'positions.id')
                            ->leftJoin('countries', 'organisation_admin.country_id', '=', 'countries.id')
                            ->leftJoin('counties', 'organisation_admin.county_id', '=', 'counties.id')
                            ->leftJoin('constituencies', 'organisation_admin.constituency_id', '=', 'constituencies.id')
                            ->leftJoin('wards', 'organisation_admin.ward_id', '=', 'wards.id')
                            ->where('users.id', Auth::user()->id)
                            ->select('users.*',
                                'organisation_admin.*',
                                    'countries.name as country_name',
                                    'counties.name as county_name',
                                    'constituencies.name as constituency_name',
                                    'wards.name as ward_name',
                                    'positions.name as position_name'
                            )->first();
                            // return Auth::user()->id;
                            // return $logged_user;
        $organisation = Organisation::with('about','services', 'servicemodels', 'adverts', 'features',
                               'organisationdirectors', 'organisationadmins', 'organisationemployees')
                               ->first();

        return view('admin.adminmaster', compact("logged_user", "organisation"));
            } elseif (auth()->user()->hasRole('Organisation Admin')) {
                $logged_user =User::
                            leftJoin('organisation_admin', 'organisation_admin.user_id', '=', 'users.id')
                            ->leftJoin('positions', 'organisation_admin.position_id', '=', 'positions.id')
                            ->leftJoin('countries', 'organisation_admin.country_id', '=', 'countries.id')
                            ->leftJoin('counties', 'organisation_admin.county_id', '=', 'counties.id')
                            ->leftJoin('constituencies', 'organisation_admin.constituency_id', '=', 'constituencies.id')
                            ->leftJoin('wards', 'organisation_admin.ward_id', '=', 'wards.id')
                            ->where('users.id', Auth::user()->id)
                            ->select('users.*',
                                'organisation_admin.*',
                                    'countries.name as country_name',
                                    'counties.name as county_name',
                                    'constituencies.name as constituency_name',
                                    'wards.name as ward_name',
                                    'positions.name as position_name'
                            )->first();
                            // return Auth::user()->id;
                            // return $logged_user;
        $organisation = Organisation::with('about','services', 'servicemodels', 'adverts', 'features',
                               'organisationdirectors', 'organisationadmins', 'organisationemployees')
                               ->first();

        return view('admin.adminmaster', compact("logged_user", "organisation"));
            }
        }

        //bureau

        if (auth()->check()) {
            if (auth()->user()->hasRole('Bureau Director')) {
                $logged_user =User::
                            leftJoin('bureau_director', 'bureau_director.user_id', '=', 'users.id')
                            ->leftJoin('positions', 'bureau_director.position_id', '=', 'positions.id')
                            ->leftJoin('countries', 'bureau_director.country_id', '=', 'countries.id')
                            ->leftJoin('counties', 'bureau_director.county_id', '=', 'counties.id')
                            ->leftJoin('constituencies', 'bureau_director.constituency_id', '=', 'constituencies.id')
                            ->leftJoin('wards', 'bureau_director.ward_id', '=', 'wards.id')
                            ->where('users.id', Auth::user()->id)
                            ->select('users.*',
                                'bureau_director.*',
                                    'countries.name as country_name',
                                    'counties.name as county_name',
                                    'constituencies.name as constituency_name',
                                    'wards.name as ward_name',
                                    'positions.name as position_name'
                            )->first();
                            // return Auth::user()->id;
                            // return $logged_user;
        $bureau = Bureau::with('bureaudirectors', 'bureauadmins', 'bureauemployees')
                               ->first();

                  return view('admin.bureaumaster', compact("logged_user", "bureau"));
            }
            elseif (auth()->user()->hasRole('Bureau Superadmin')) {
                $logged_user =User::
                            leftJoin('bureau_admin', 'bureau_admin.user_id', '=', 'users.id')
                            ->leftJoin('positions', 'bureau_admin.position_id', '=', 'positions.id')
                            ->leftJoin('countries', 'bureau_admin.country_id', '=', 'countries.id')
                            ->leftJoin('counties', 'bureau_admin.county_id', '=', 'counties.id')
                            ->leftJoin('constituencies', 'bureau_admin.constituency_id', '=', 'constituencies.id')
                            ->leftJoin('wards', 'bureau_admin.ward_id', '=', 'wards.id')
                            ->where('users.id', Auth::user()->id)
                            ->select('users.*',
                                'bureau_admin.*',
                                    'countries.name as country_name',
                                    'counties.name as county_name',
                                    'constituencies.name as constituency_name',
                                    'wards.name as ward_name',
                                    'positions.name as position_name'
                            )->first();
                            // return Auth::user()->id;
                            // return $logged_user;
        $bureau = Bureau::with('bureaudirectors', 'bureauadmins', 'bureauemployees')
                               ->first();

        return view('admin.bureaumaster', compact("logged_user", "bureau"));
            } elseif (auth()->user()->hasRole('Bureau Admin')) {
                $logged_user =User::
                            leftJoin('bureau_admin', 'bureau_admin.user_id', '=', 'users.id')
                            ->leftJoin('positions', 'bureau_admin.position_id', '=', 'positions.id')
                            ->leftJoin('countries', 'bureau_admin.country_id', '=', 'countries.id')
                            ->leftJoin('counties', 'bureau_admin.county_id', '=', 'counties.id')
                            ->leftJoin('constituencies', 'bureau_admin.constituency_id', '=', 'constituencies.id')
                            ->leftJoin('wards', 'bureau_admin.ward_id', '=', 'wards.id')
                            ->where('users.id', Auth::user()->id)
                            ->select('users.*',
                                'bureau_admin.*',
                                    'countries.name as country_name',
                                    'counties.name as county_name',
                                    'constituencies.name as constituency_name',
                                    'wards.name as ward_name',
                                    'positions.name as position_name'
                            )->first();
                            // return Auth::user()->id;
                            // return $logged_user;
        $bureau = Bureau::with('bureaudirectors', 'bureauadmins', 'bureauemployees')
                               ->first();

        return view('admin.bureaumaster', compact("logged_user", "bureau"));

        } elseif (auth()->user()->hasRole('Bureau Employee')) {
            $logged_user =User::
                        leftJoin('bureau_employee', 'bureau_employee.user_id', '=', 'users.id')
                        ->leftJoin('positions', 'bureau_employee.position_id', '=', 'positions.id')
                        ->leftJoin('countries', 'bureau_employee.country_id', '=', 'countries.id')
                        ->leftJoin('counties', 'bureau_employee.county_id', '=', 'counties.id')
                        ->leftJoin('constituencies', 'bureau_employee.constituency_id', '=', 'constituencies.id')
                        ->leftJoin('wards', 'bureau_employee.ward_id', '=', 'wards.id')
                        ->where('users.id', Auth::user()->id)
                        ->select('users.*',
                            'bureau_employee.*',
                                'countries.name as country_name',
                                'counties.name as county_name',
                                'constituencies.name as constituency_name',
                                'wards.name as ward_name',
                                'positions.name as position_name'
                        )->first();
                        // return Auth::user()->id;
                            // return $logged_user;
        $bureau = Bureau::with('bureaudirectors', 'bureauemployees', 'bureauemployees')
                            ->first();

        return view('admin.bureaumaster', compact("logged_user", "bureau"));
        }


        }


    }
}
