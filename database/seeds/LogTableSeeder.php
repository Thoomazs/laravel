<?php

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\Request;

    class LogTableSeeder extends Seeder
    {

        public function run()
        {
            DB::table( 'log' )->delete();


            $logs = [ 'level'      => 'info',
                      'user_id'       => 1,
                      'message'    => 'DB SEED',
                      'ip'         => Request::ip(),
                      'created_at' => new DateTime,
                      'updated_at' => new DateTime, ];

            DB::table( 'log' )->insert( $logs );
        }

    }
