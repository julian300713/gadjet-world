<?php

class UsersTableSeeder extends Seeder {

    public function run() {
        $user = new User;
        $user->firstname = 'omatsola';
        $user->lastname = 'sobotie';
        $user->email = 'tsola2002@yahoo.co.uk';
        $user->password = Hash::make('brov2002');
        $user->telephone = '5557771234';
        $user->admin = 1;
        $user->save();
    }
}