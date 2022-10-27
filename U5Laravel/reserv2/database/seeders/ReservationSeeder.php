<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reserv = new Reservation();
        // $reserv->client_id = 1;
        // $reserv->id_room = 1;
        $reserv->start_date = '2022-10-22';
        $reserv->end_date = '2022-10-26';
        $reserv->total = 3000.50;
        $reserv->save();

        $reserv = new Reservation();
        // $reserv->client_id = 1;
        // $reserv->id_room = 1;
        $reserv->start_date = '2022-10-10';
        $reserv->end_date = '2022-10-12';
        $reserv->total = 2300.00;
        $reserv->save();
    }
}
