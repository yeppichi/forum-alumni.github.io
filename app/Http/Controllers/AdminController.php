<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Categories;
use App\Models\Department;
use App\Models\Discussion;
use App\Models\User;
use App\Models\Profile;
use App\Models\Topics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
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


        $data['department'] = Department::whereNotNull('name')->count();
        // $data['generation'] = Categories::whereNotNull('school_generation')->count();

        // $data['oto'] = Profile::whereHas('department', function ($query) {
        //     $query->where('name', 'Teknik Ototronik');
        // })->select(
        //     DB::raw('COUNT(*) as count')
        // )
        // ->whereNotNull('categories_id')
        // ->groupBy('categories_id')
        //     ->get();


        $data['meka'] = Profile::whereHas('department', function ($query) {
            $query->where('name', 'Teknik Mekatronik');
        })->select(
            DB::raw('COUNT(*) as count')
        )
        ->whereNotNull('categories_id')
        ->groupBy('categories_id')
            ->get();


        // $data['sija'] = Profile::whereHas('department', function ($query) {
        //     $query->where('name', 'Sistem Informatika Jaringan dan Aplikasi');
        // })->select(
        //     DB::raw('COUNT(*) as count')
        // )
        // ->whereNotNull('categories_id')
        // ->groupBy('categories_id')
        //     ->get();


        // $data['meka'] = Profile::whereHas('department', function ($query) {
        //     $query->where('name', 'Teknik Mekatronik');
        // })->count();
        // $data['sija'] = Profile::whereHas('department', function ($query) {
        //     $query->where('name', 'Sistem Informatika Jaringan dan AplikasI');
        // })->count();
        
        $data['kerja'] = Profile::whereHas('activity', function ($query) {
            $query->where('name', 'kerja');
        })->count();
        $data['kuliah'] = Profile::whereHas('activity', function ($query) {
            $query->where('name', 'kuliah');
        })->count();
        $data['lainnya'] = Profile::whereHas('activity', function ($query) {
            $query->where('name', 'lainnya');
        })->count();

        $data['user'] = User::count();
        $data['topic'] = Topics::count();
        $data['discuss'] = Discussion::count();
        $data['profile'] = Profile::count();


        return view('admin.home', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // public function gra
}
