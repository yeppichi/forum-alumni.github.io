<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activity = [
            'kuliah',
            'kerja',
            'lainnya',
        ];

        // DB::table('activity')->insert($data);

        foreach($activity as $item){
            Activity::firstOrCreate(['name' => $item]);
        }
    }
}
