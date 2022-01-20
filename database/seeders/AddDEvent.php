<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class AddDEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title'=>'Demo Event-1', 'start_day'=>'2021-07-11', 'end_day'=>'2021-07-12', 'start_time'=>'18:00', 'end_time'=>'19:00'],
            ['title'=>'Demo Event-1', 'start_day'=>'2021-07-11', 'end_day'=>'2021-07-12', 'start_time'=>'18:00', 'end_time'=>'19:00'],
            ['title'=>'Demo Event-1', 'start_day'=>'2021-07-11', 'end_day'=>'2021-07-12', 'start_time'=>'18:00', 'end_time'=>'19:00'],
        ];
        foreach ($data as $key => $value) {
            Event::create($value);
        }
    }
}
