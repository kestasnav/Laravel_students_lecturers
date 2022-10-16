<?php

namespace Database\Seeders;

use App\Models\GroupUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddGroupUserFakers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GroupUser::factory()->count(15)->create();

    }
}
