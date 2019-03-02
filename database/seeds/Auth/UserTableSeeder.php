<?php


use App\Models\Standard\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Organisation\Organisation;

class UserTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        $user1 =User::create([
                'first_name'        => 'Felix',
                'last_name'         => 'Nyachio',
                'email'             => 'felixnyachio@teifinnovate.foundation',
                'password'          => Hash::make('flx4life'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'user_type'        => 'Organisation Superadmin',
                'confirmed'         => true,

        ]);//2

        if($user1)
        {
            DB::table('organisation_admin')
                ->insert([
                    'user_id'          => $user1->id,
                    'organisation_id'  => 1,
                    'position_id'      => 5,
                    'gender_id'        => 1,
                    'active'           => 1
                ]);
        }

        $this->enableForeignKeys();
    }
}
