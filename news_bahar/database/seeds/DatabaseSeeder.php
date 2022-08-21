<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->insert([
            'id' => (string) Str::uuid(),
            'name'=> 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => null,
        ]);


}
}