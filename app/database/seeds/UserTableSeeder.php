<?php
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->delete();

 
        User::create(array(
            'username' => 'Steven',
            'password' => Hash::make('pass'),
            'bio' => "Cumque, itaque expedita placeat suscipit dolores nostrum soluta cum ut nesciunt voluptatem facilis accusamus incidunt saepe magni ducimus hic dicta quasi eum."
        ));
 
        User::create(array(
            'username' => 'John',
            'password' => Hash::make('pass')
        ));

        User::create(array(
            'username' => 'Jane',
            'password' => Hash::make('pass')
        ));

        User::create(array(
            'username' => 'Nobody',
            'password' => Hash::make('pass')
        ));
    }
 
}