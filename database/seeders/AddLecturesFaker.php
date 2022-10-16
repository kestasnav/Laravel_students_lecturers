<?php

namespace Database\Seeders;

use App\Models\Lecture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddLecturesFaker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lecture::factory()->count(22)->create();
    }
}
