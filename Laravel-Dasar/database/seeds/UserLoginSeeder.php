<?php

use Illuminate\Database\Seeder;

class UserLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->name = "ADMIN TRANSISI";
        $administrator->email = "admin@transisi.id";
        $administrator->password = \Hash::make("transisi");

        $administrator->save();

        $this->command->info("User Login berhasil diinsert");
    }
}
