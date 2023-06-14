<?php

namespace App\Http\Controllers;

use App\Models\Topics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topic = Topics::all();
        $data['topic'] = $topic;

        return view('admin.topics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topic = Topics::all();
        $data['topic'] = $topic;

        return view('admin.topics.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);

        try{
            $topic = new Topics();
            $topic->title = $request->title;
            $topic->slug = $request->slug;
            $topic->description = $request->description;
            $topic->save();

            return redirect()->route('admin.topic.index')->with('success', 'Topic successfully created');
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
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try{
            $topic = Topics::findOrFail($id);
            $topic->delete();

            DB::commit();

            Session::flash('success', 'Topic successfully deleted');

            return response()->json([
                'success' => true,
                'message' => 'Topic successfully deleted',
            ], 200);
        }catch(\Throwable $th){
            DB::rollback();

            Session::flash('failed', $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Topic successfully deleted',
            ], 200);
        }
    }
}
