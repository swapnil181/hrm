<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Register;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = array(
                     array(
                            "name"        => "Escalation",
                            "email"       => "escalation@nprodax.com",
                            "mobile"      => "9890679080",
                            "role"        => "EscalationManager",
                            "dob"         => "1989-11-30" ,
                            "joining_date"=> "2018-10-20" , 
                            "employee_id" => "00001",
                            "password"    => bcrypt("Nprodax@123"),
                           )
                   );
        User::insert($user);
        Register::insert($user);
   }
}

