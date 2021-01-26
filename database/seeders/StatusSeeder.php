<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'id' => 1,
                'name' => 'Open',
                'slug' => 'open',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Pending',
                'slug' => 'pending',
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Completed',
                'slug' => 'completed',
                'created_at' => now(),
            ],
        ];
        Status::insert($status);
    }
}
