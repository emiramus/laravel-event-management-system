<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventsTableSeeder extends Seeder
{
    public function run()
    {
        $events = [
            [
                'event_name' => 'Tech Conference 2023',
                'date' => '2023-11-15',
                'location' => 'Convention Center, Skopje',
                'description' => 'Annual technology conference featuring the latest innovations.'
            ],
            [
                'event_name' => 'Music Festival',
                'date' => '2023-12-20',
                'location' => 'City Park',
                'description' => 'Weekend music festival with local and international artists.'
            ],
            [
                'event_name' => 'Business Workshop',
                'date' => '2023-10-05',
                'location' => 'Business Hub, Tetovo',
                'description' => 'Learn essential business skills from industry experts.'
            ],
            [
                'event_name' => 'Charity Run',
                'date' => '2023-09-10',
                'location' => 'City Center',
                'description' => '5K run to raise funds for local community projects.'
            ],
            [
                'event_name' => 'Art Exhibition',
                'date' => '2023-11-01',
                'location' => 'National Gallery',
                'description' => 'Showcasing works from emerging local artists.'
            ]
        ];

        DB::table('events')->insert($events);
    }
}