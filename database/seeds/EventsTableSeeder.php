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
        Event::create(['name' => 'event1', 'cookie_id' => 1, 'referrer' => 'referrer1', 'created_at' => '2018-07-07']);
        Event::create(['name' => 'event2', 'cookie_id' => 2, 'referrer' => 'referrer2', 'created_at' => '2018-07-07']);
    }
}
