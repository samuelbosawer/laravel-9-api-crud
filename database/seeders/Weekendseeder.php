<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Weekendmodel;

class Weekendseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
         Weekendmodel::create([
            'name' => 'Samuel',
            'job' => 'Math and Data Science Enthusiast',
            'topic' => 'The Requirements of Competitive Programming',
            'date' => '2 Juni 2022',
            'jam_mulai' => '06.00',
            'jam_selesai' => '08.00',
            'picture' => '1.jpg',
         ]);
    }
}
