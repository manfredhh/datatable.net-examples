<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;             // bring in
use Carbon\Carbon;                      // bring in
use App\User;                           // bring in
use App\Data;                           // bring in

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        # create 3 specific users
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@datatables.com',
                'is_admin' => true,
                'password' => Hash::make('secret'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),        
            ],
            [
                'name' => 'Hans',
                'email' => 'hans@datatables.com',
                'is_admin' => true,
                'password' => Hash::make('secret'),
                'remember_token' => Str::random(10),
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name' => 'Manfred',
                'email' => 'manfred@datatables.com',
                'is_admin' => true,
                'password' => Hash::make('secret'),
                'remember_token' => Str::random(10),
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
        ];   
        DB::table('users')->insert($users);
        
        # creating fake entries
        factory(User::class, 10)->create();
        factory(Data::class, 100)->create();
    }
}
