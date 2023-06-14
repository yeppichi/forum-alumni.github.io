<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $data['user'] = User::findOrFail($id);
        
        return view('user.show', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['user'] = User::findOrFail($id);

        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try{
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;

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

            return redirect()->route('account.show', $user->id)->with('success', 'data berhaisl diedit');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'gagal');
        }
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
