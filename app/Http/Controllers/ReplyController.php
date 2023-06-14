<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Replies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //kosong
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //kosong
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        //kosong
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
    public function edit(string $id)
    {
        $data['reply'] = Replies::findOrFail($id);

        return view('reply.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'content',
        ]);

        try{
            $reply = Replies::findOrFail($id);
            $reply->content = $request->content;
            $reply->save();

            return redirect()->route('')->with('success', 'data berhasil diinput');
        }catch(\Throwable $th){
            return redirect()->back()->with('failed', 'data gagal diinput');
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
