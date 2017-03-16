<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('clients')->insert([ 
            'email' => 'aperson@gmail.com',
            'telephone' => \Crypt::encrypt('077 1234 5678'),
            'client_data' => '{"field1":"afield1","field2":"afield2","field3":"afield3","field4":"afield4","field5":"afield5","field6":"afield6","field7":"afield7","field8":"afield8"}',
        ]);
    }
}
