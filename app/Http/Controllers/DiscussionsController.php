<?php

namespace App\Http\Controllers;

use App\Models\Topics;
use App\Models\Replies;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Session;

class DiscussionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['discuss'] = Discussion::all();

        return view('admin.discussions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //kosong
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //kosong
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['discuss'] = Discussion::findOrFail($id);
        $data['reply'] = Replies::where('discuss_id', $id)->get();

        return view('admin.discussions.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //kosong
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //kosong
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $discussion = Discussion::findOrFail($id);

            $replies = Replies::where('discuss_id', $discussion->id)->get();

            foreach ($replies as $reply) {
                $reply->delete();
            }

            $discussion->delete();

            DB::commit();

            Session::flash('success', 'Discussion Successfully Deleted!');

            return response()->json([
                'success' => true,
                'message' => 'Discussion successfully deleted',
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


    public function destroy_replies($id)
    {
        DB::beginTransaction();

        try {
            $reply =  Replies::find($id);
            $reply->delete();

            DB::commit();

            Session::flash('success', 'Cash Request Successfully Deleted!');

            return response()->json([
                'success' => true,
                'message' => 'Cash Request successfully deleted',
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
