<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // menghitung banyaknya alumni per angkatan
        $data['alumni'] = DB::table('profile')
        ->select(
            DB::raw('COUNT(*) as count')
        )
        ->whereNotNull('categories_id')
        ->groupBy('categories_id')
            ->get();

        // memberi nama angkatan
        $data['graduated'] = DB::table('categories')
        ->select(
            DB::raw("CONCAT('Angkatan ', SUBSTRING_INDEX(school_generation, ' ', -1)) as name"),
        )
        ->whereNotNull('school_generation')
        ->groupBy('name')
            ->get();

            
        $data['ototronik'] = Profile::where('department_id', 1)->count();
        $data['mekatronik'] = Profile::where('department_id', 2)->count();
        $data['sija'] = Profile::where('department_id', 3)->count();

        $data['discuss'] = Discussion::orderBy('created_at', 'desc')->take(5)->get();

        return view('home', $data);
    }
}
