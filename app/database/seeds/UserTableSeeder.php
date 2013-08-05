<?php
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->delete();

 
        User::create(array(
            'username' => 'Abraham_Lincoln',
            'password' => Hash::make('pass'),
            'bio' => '16th President of the United States',
            'avatar' => 'jpg'
        ));
 
        User::create(array(
            'username' => 'Albert_Einstein',
            'password' => Hash::make('pass'),
            'bio' => 'Theoretical physicist who developed the general theory of relativity',
            'avatar' => 'jpg'
        ));

        User::create(array(
            'username' => 'Edgar_Allan_Poe',
            'password' => Hash::make('pass'),
            'bio' => 'Author, poet, editor, and literary critic, considered part of the American Romantic Movement',
            'avatar' => 'jpg'
        ));

        User::create(array(
            'username' => 'Emily_Dickinson',
            'password' => Hash::make('pass'),
            'bio' => 'American poet',
            'avatar' => 'jpg'
        ));
    }
 
}