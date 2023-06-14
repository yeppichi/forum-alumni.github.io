<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class ProfileAuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $user_id = Auth::user()->id;
        // Profile::firstOrCreate(['user_id' => $user_id]);

        // $user = Auth::user();
        // if ($user) {
        //     $user_id = optional($user)->id;
        //     Profile::firstOrCreate(['user_id' => $user_id]);
        // }

        $user = Auth::user();

        $profile = new Profile();
        $profile->user_id = $user->id;
        // $profile->department_id = 1; // contoh jika department id nya 1
        // $profile->graduated = '2010-05-01';
        $profile->save();
    }
}
