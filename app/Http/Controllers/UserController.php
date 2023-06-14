<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Throw_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['user'] = User::all();

        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['user'] = User::all();

        return view('admin.users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        try{
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->level = 'user';
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            // Check if a new avatar image file has been uploaded
            if ($request->hasFile('avatar')) {
                $destinationPath = public_path('assets/images/avatar-user/');

                // Move the new avatar image file to the storage directory
                $avatar = $request->file('avatar');
                $avatar->move($destinationPath, $avatar->getClientOriginalName());

                // Set the new avatar file name to the user
                $user->avatar = $avatar->getClientOriginalName();
            } else {
                // Set the default avatar file name to the user
                $user->avatar = 'default.jpg';
            }

            // Save the user data
            $user->save();


            // $user->save();

            return redirect()->route('admin.user.index')->with('success', 'User created successfully!');
        }catch(\Throwable $th){
            return redirect()->back()->with('failed', $th->getMessage());
        }
            
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       //kosong
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['user'] = User::findOrFail($id);

        return view('admin.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        try{
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = $request->password;

            // Check if a new avatar image file has been uploaded
            if ($request->hasFile('avatar')) {
                $destinationPath = public_path('assets/images/avatar-user/');

                // Delete the old avatar image file from storage
                if ($user->avatar && Storage::exists('public/assets/images/avatar-user/' . $user->avatar)) {
                    Storage::delete('public/assets/images/avatar-user/' . $user->avatar);
                }

                // Move the new avatar image file to the storage directory
                $avatar = $request->file('avatar');
                $avatar->move($destinationPath, $avatar->getClientOriginalName());

                // Set the new avatar file name to the user
                $user->avatar = $avatar->getClientOriginalName();
            }

            $user->save();

            return redirect()->route('admin.user.index')->with('success', 'User edited successfully!');
        }catch(\Throwable $th){
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
            if (Auth::id() == $id) {
                return redirect()->back()->with('failed', 'You can not delete admin!');
            }
            $user = User::find($id);
            $user->delete();

            DB::commit();

            Session::flash('success', 'User deleted successfully!');

            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully!',
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
