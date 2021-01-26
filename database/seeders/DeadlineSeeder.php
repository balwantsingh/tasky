<?php

namespace Database\Seeders;

use App\Models\Deadline;
use Illuminate\Database\Seeder;

class DeadlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deadlines = [
            [
                'id' => 1,
                'name' => '1 day',
                'slug' => '1-day',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'name' => '1 week',
                'slug' => '1-week',
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'name' => '1 month',
                'slug' => '1-month',
                'created_at' => now(),
            ],
        ];
        Deadline::insert($deadlines);
    }
}
