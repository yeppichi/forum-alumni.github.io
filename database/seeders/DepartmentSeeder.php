<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = [
            'Teknik Ototronik',
            'Teknik Mekatronik',
            'Sistem Informasi Jaringan dan Aplikasi'
        ];

        foreach($department as $item){
            Department::firstOrCreate(['name' => $item]);
        }
        // $data = [
        //     [
        //         'name' => 'Teknik Ototronik',
        //     ],
        //     [
        //         'name' => 'Teknik Mekatronik',
        //     ],
        //     [
        //         'name' => 'Sistem Informatika Jaringan dan Aplikasi',
        //     ],
        // ];

        // DB::table('department')->insert($data);
        
    }
}
