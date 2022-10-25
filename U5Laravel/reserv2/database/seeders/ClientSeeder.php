<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $client-> name = "Pepe Veraz";
        $client-> phone_number = "4815162342";
        $client-> email = "pepeveraz@dimmsdale.com";
        $client->save();

        $client = new Client();
        $client-> name = "Señora Nesbit";
        $client-> phone_number = "6121765538";
        $client-> email = "nesbit@fuzetea.com";
        $client->save();
    }
}
