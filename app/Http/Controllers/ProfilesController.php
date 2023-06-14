<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Activity;
use App\Models\Categories;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['profile'] = Profile::all();

        return view('admin.profiles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Categories::all();
        $data['profile'] = Profile::all();
        $data['user'] = User::all();
        $data['department'] = Department::all();
        $data['activity'] = Activity::all();

        return view('admin.profiles.create', $data);
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
            }else{
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
            return redirect()->back()->with('failed',$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['profile'] =  Profile::findOrFail($id);
        $data['user'] = User::all();
       
        return view('admin.profiles.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['categories'] = Categories::all();
        $data['profile'] = Profile::findOrFail($id);
        $data['user'] = User::all();
        $data['department'] = Department::all();
        $data['activity'] = Activity::all();

        return view('admin.profiles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $profile = Profile::find($id);
            $profile->delete();

            DB::commit();

            Session::flash('success', 'Profile successfully deleted!');

            return response()->json([
                'success' => true,
                'message' => 'Profile successfully deleted',
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
