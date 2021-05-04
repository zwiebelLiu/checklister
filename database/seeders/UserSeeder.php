<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //)) UserFactory::defi();
       /*
        User::create([
            'name'=>'Admin',
             'email'=>'admin@admin.com',
             'password'=>bcrypt('12345678'),
             'is_admin'=>1
             ]);

       */
        DB::table('users')->update(array('age'=>rand(0,30)));
/*
        //User::factory(3)->create();
      //  App\User::all()->random()->id,
        DB::table('users')->update([
            'age'=>random()
             ]);
  */
    }
}
