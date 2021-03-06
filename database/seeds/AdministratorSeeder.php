<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\User;
        $admin->name = "administrator";
        $admin->email = "Andri@gmail.com";
        $admin->password = Hash::make("admin123");
        $admin->roles = "Administrator";
        $admin->save();
        $this->command->info("Admin berhasil ditambah");
    }   

}
