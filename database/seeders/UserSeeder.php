<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'username' => 'admin',
            'password' => bcrypt('programmer'),
            'user_type_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // individu datas

        User::insert([
            'username' => 'individu',
            'password' => bcrypt('programmer'),
            'user_type_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        User::insert([
            'username' => 'indivisong',
            'password' => bcrypt('programmer'),
            'user_type_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        Member::insert([
            'user_id' => 2,
            'full_name' => 'Sulaiman dan Said',
            'gender' => 'Male',
            'birthplace' => 'Sungai Penuh',
            'birthdate' => new Carbon('first day of January 1995'),
            'origin_address' => 'Sungai Penuh Jauh',
            'blood_type' => 'O',
            'university' => 'UMY',
            'faculty' => 'Teknik',
            'major' => 'Teknik Informasi',
            'address' => 'sonopakis lor',
            'email' => 'sulaiman.uzumaki@gmail.com',
            'photo' => 'https://i.pravatar.cc/150?u=sulaiman',
            'signature' => 'http://localhost:8000/img/ttd.png'
        ]);

        User::insert([
            'username' => 'organisasi',
            'password' => bcrypt('programmer'),
            'user_type_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
