<?php

use Illuminate\Database\Seeder;
use App\Models\Organisation\OrganisationAdmin;

class OrganisationAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrganisationAdmin::create([
            'user_id'  => '1',
            'organisation_id'  => '1',
            'position_id'  => '5',//super admin
            'gender_id'  => '1',
            'country_id'     => '1',
            'county_id'      => '47',
            'constituency_id'=> '16',
            'ward_id'        => '1',
            ]);
    }
}
