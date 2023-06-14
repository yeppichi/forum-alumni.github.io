<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Core\File;
use App\Models\Profile;
use App\Models\Activity;
use App\Models\Categories;
use App\Models\Department;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Session\Session;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */

    public function category()
    {
        // $data['department'] = Department::all();
        $data['category'] = Categories::all();
        $data['profile'] = Profile::all();

        return view('profile.category', $data);
    }

    public function index($id)
    {
        // $categories_id = $request->categories_id;
        // $department_id = $request->department_id;

        // $profiles = Profile::where('categories_id', $categories_id)
        //     ->where('department_id', $department_id)
        //     ->get();

        // return view('profile.index', compact('profiles', 'categories_id', 'department_id'));


        $category= Categories::findOrFail($id);
        $data['profile'] = Profile::whereHas('categories', function ($query) use ($category) {
            $query->where('id', $category->id);
        })->get();

        return view('profile.index',compact('category'), $data);
    }

    // public function find()
    // {
    //     // Ambil data user yang sedang login
    //     $user = Auth::user();

    //     // Cari profile user berdasarkan nama
    //     $profile = User::where('name', $user->name)->first();

    //     // Kembalikan view dengan data profile
    //     return view('profile.show', $profile->id);
    //     // return view('profile.show', ['profile' => $profile]);
    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['profile'] = Profile::all();
        $data['user'] = User::all();
        $data['department'] = Department::all();
        $data['activity'] = Activity::all();

        return view('profile.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user_id' => 'nullable',
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'birth_date' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'bio' => 'nullable',
            'department_id' => 'required',
            'categories_id' => 'required',
            'activity_id' => 'required',
            'description' => 'required',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
            'linkedin' => 'nullable',
        ]);

        try {
            // dd($request->all());
            $profile = new Profile();
            if ($request->has('user_id')) {
                $profile->user_id = $request->user_id;
            } else {
                $profile->user_id = null;
            }
            $profile->name = $request->name;

            // Check if a new avatar image file has been uploaded
            if ($request->hasFile('image')) {
                $destinationPath = public_path('assets/images/profile-image/');

                // Move the new avatar image file to the storage directory
                $image = $request->file('image');
                $image->move($destinationPath, $image->getClientOriginalName());

                // Set the new avatar file name to the profile
                $profile->image = $image->getClientOriginalName();
            } else {
                // Set the default image file name to the profile
                $profile->image = 'default.jpg';
            }

            $profile->birth_date = $request->birth_date;
            $profile->gender = $request->gender;
            $profile->address = $request->address;
            $profile->bio = $request->bio;
            $profile->department_id = $request->department_id;
            $profile->categories_id = $request->categories_id;
            $profile->activity_id = $request->activity_id;
            $profile->description = $request->description;
            $profile->instagram = $request->instagram;
            $profile->twitter = $request->twitter;
            $profile->linkedin = $request->linkedin;
            $profile->save();

            return redirect()->route('admin.profile.show', $profile->id)->with('success', 'Berhasil membuat profil!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $data['profile'] =  Profile::findOrFail($id);
        $data['user'] = User::all();
        // $data['category'] = Profile::where('categories_id', $id)->get();

        return view('profile.show', $data);
    }
    
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['profile'] = Profile::findOrFail($id);
        $data['user'] = User::all();
        $data['department'] = Department::all();
        $data['activity'] = Activity::all();

        return view('profile.edit', $data);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'nullable',
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'birth_date' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'bio' => 'nullable',
            'department_id' => 'required',
            'categories_id' => 'required',
            'activity_id' => 'required',
            'description' => 'required',
            'instagram' => 'nullable',
            'twitter' => 'nullable',
            'linkedin' => 'nullable',
        ]);

        try {
            // dd($request->all());

            $profile = Profile::findOrFail($id);

            if ($request->has('user_id')) {
                $profile->user_id = $request->user_id;
            } else {
                $profile->user_id = null;
            }

            // Check if a new avatar image file has been uploaded
            if ($request->hasFile('image')) {
                $destinationPath = public_path('assets/images/profile-image/');

                // Move the new avatar image file to the storage directory
                $image = $request->file('image');
                $image->move($destinationPath, $image->getClientOriginalName());

                // Set the new avatar file name to the profile
                $profile->image = $image->getClientOriginalName();
            } else {
                // Set the default image file name to the profile
                $profile->image = 'default.jpg';
            }

            $profile->name = $request->name;
            $profile->birth_date = $request->birth_date;
            $profile->gender = $request->gender;
            $profile->address = $request->address;
            $profile->bio = $request->bio;
            $profile->department_id = $request->department_id;
            $profile->categories_id = $request->categories_id;
            $profile->activity_id = $request->activity_id;
            $profile->description = $request->description;
            $profile->instagram = $request->instagram;
            $profile->twitter = $request->twitter;
            $profile->linkedin = $request->linkedin;
            $profile->save();

            return redirect()->route('admin.profile.show', $profile->id)->with('success', 'Profile successfully edited!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }

    // public function update(Request $request, $id)
    // {
    //     // dd($request->all());
    //     $request->validate([
    //         'graduated' => 'required',
    //         'department_id' => 'required',
    //         'born' => 'required',
    //         'address' => 'required',
    //         'activity_id' => 'required',
    //         'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     try{

    //         $profile = Profile::findOrFail($id);
    //         // $profile->name = $request->name;
    //         $profile->avatar = $request->avatar;
    //         $profile->graduated = $request->graduated;
    //         $profile->department = $request->department;
    //         $profile->born = $request->born;
    //         $profile->address = $request->address;

    //         if ($request->hasFile('avatar')) {
    //             $destinationPath = public_path('assets/images/avatar-user/');
    //             // hapus file avatar lama jika ada
    //             if ($profile->avatar && Storage::exists($destinationPath . $profile->avatar)) {
    //                 Storage::delete('public/assets/images/avatar-user/' . $profile->avatar);
    //             }

    //             // pindahkan file avatar baru ke folder public/assets/images/avatar-user/
                
    //             $request->file('avatar')->move($destinationPath, $request->file('avatar')->getClientOriginalName());

    //             // simpan nama file avatar baru ke database
    //             $profile->avatar = $request->file('avatar')->getClientOriginalName();
    //         }

    //         $profile->save();

    //         return redirect()->route('cash-request.index')->with('success', 'Cash request has been edited successfully.');
    //     } catch (\Throwable $th) {
    //         return redirect()->back()->with('failed', $th->getMessage());
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $profile = Profile::findOrFail($id);

            // hapus avatar jika ada
            if ($profile->avatar) {
                $destinationPath = public_path('assets/images/avatar-user/');
                if (Storage::exists($destinationPath . $profile->avatar)) {
                    Storage::delete($destinationPath . $profile->avatar);
                }
            }

            $profile->delete();

            DB::commit();
            Session::flash('success', 'Berhasil Menghapus Profile!');

            return response()->json([
                'success' => true,
                'message' => 'Berhasil menghapus profile!',
            ], 200);

        } catch (\Throwable $th) {
            DB::rollBack();
            Session::flash('failed', $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 200);
        }
    }
}
