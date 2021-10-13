<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            [
                'uuid'              => Uuid::uuid4()->toString(),
                'name'              => 'Razzi Aftab',
                'email'             => 'razzi.aftab@techverx.com',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
            [
                'uuid'              => Uuid::uuid4()->toString(),
                'name'              => 'Rikka Nextvacay',
                'email'             => 'rikka@nextvacay.com',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
            [
                'uuid'              => Uuid::uuid4()->toString(),
                'name'              => 'Hassan Afaq',
                'email'             => 'razzi.aftab+1@techverx.com',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now()
            ],
        ]);
    }
}
