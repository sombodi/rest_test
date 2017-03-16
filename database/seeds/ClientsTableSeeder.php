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
         DB::table('clients')->insert(
            [[ 
            'email' => 'aperson@gmail.com',
            'telephone' => \Crypt::encrypt('077 1234 5678'),
            'client_data' => '{"field1":"afield1","field2":"afield2","field3":"afield3","field4":"afield4","field5":"afield5","field6":"afield6","field7":"afield7","field8":"afield8"}',
            ],
            [ 
            'email' => 'another_person@gmail.com',
            'telephone' => \Crypt::encrypt('077 4567 8901'),
            'client_data' => '{"other1":"another1","other2":"another2","other3":"another3","other4":"another4","other5":"another5","other6":"another6","other7":"another7","other8":"another8"}',
            ]]);
    }
}
