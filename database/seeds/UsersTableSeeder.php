<?php

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\Hash;

    class UsersTableSeeder extends Seeder
    {

        public function run()
        {
            DB::table( 'users' )->delete();


            $users = [ [ 'firstname'  => 'Tomáš',
                         'lastname'   => 'Novotný',
                         'slug'       => 'tomas-novotny',
                         'email'      => 'novotny@cynet.cz',
                         'password'   => Hash::make( 'heslo' ),
                         'created_at' => new DateTime,
                         'updated_at' => new DateTime ],
                       [ 'firstname'  => '',
                         'lastname'   => '',
                         'slug'       => 'test',
                         'email'      => 'test@cynet.cz',
                         'password'   => Hash::make( 'heslo' ),
                         'created_at' => new DateTime,
                         'updated_at' => new DateTime ] ];

            DB::table( 'users' )->insert( $users );
        }

    }
