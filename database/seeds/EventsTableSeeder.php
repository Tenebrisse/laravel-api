<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create(['name' => 'click', 'cookie_id' => 1, 'referrer' => 'pub1', 'created_at' => '2018-07-07']);
        Event::create(['name' => 'print', 'cookie_id' => 2, 'referrer' => 'pub1', 'created_at' => '2018-07-07']);
    }
}
