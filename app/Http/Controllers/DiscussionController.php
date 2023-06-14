<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Topics;
use App\Models\Profile;
use App\Models\Replies;
use App\Models\Discussion;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['discuss'] = Discussion::all();
        // $data['discussion'] = Discussion::findOrFail($id);
        $data['user'] = User::all();
        $data['topic'] = Topics::all();

        return view('discuss.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['discuss'] = Discussion::all();
        $data['user'] = User::all();
        $data['topic'] = Topics::all();

        return view('discuss.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->file('image'));
        $request->validate([
            'content' => 'required',
            // 'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // validation for uploaded images
        ]);
        

        try {
            $discuss = new Discussion();
            $discuss->avatar_id = Auth::user()->id;
            $discuss->sender_id = Auth::user()->id;
            $discuss->topic_id = $request->topic_id;
            $discuss->content = $request->content;
            // $discuss->replies_id = $request->replies;

            if ($request->hasFile('image')) {
                $destinationPath = public_path('assets/images/content-discuss/');
                $image = [];

                foreach ($request->file('image') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move($destinationPath, $filename);
                    $image[] = $filename;
                }

                $discuss->image = json_encode($image);
            }

            $discuss->save();


            return redirect()->route('discuss.index')->with('success', 'Discussion created successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Failed to create discussion!');
        }
    }

    // public function like(Discussion $discussion, $id)
    // {

    //     $discussion->likes()->create([
    //         'user_id' => auth()->id(),
    //     ]);

    //     return response()->json([
    //         'message' => 'Discussion liked successfully!',
    //     ]);
    // }

    // public function pressLike(Request $request)
    // {
    //     $discussion = Discussion::find($request->discussion_id);
    //     if ($discussion->likes->contains('user_id', auth()->id())) {

    //         $discussion->likes()->where('user_id', auth()->id())->delete();
    //     } else {
    //         $discussion->likes()->create(['user_id' => auth()->id()]);
    //     }
    //     $count = $discussion->likes()->count();
    //     $pusherData['discussion_id'] = $discussion->id;
    //     $pusherData['count'] = $count;
    //     $this->push('likes', $pusherData);
    //     return response()->json(['likes' => $count]);
    // }


    public function like(Request $request, $id)
    {
        $discuss = Discussion::findOrFail($id);
        $discuss->likes()->attach(auth()->user());

        return response()->json(['message' => 'Liked']);

        // return view('discuss.index');
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['discuss'] = Discussion::findOrFail($id);
        // $data['reply'] = Replies::all();
        $data['reply'] = Replies::where('discuss_id', $id)->get();

        return view('discuss.show', $data);
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'content' => 'required'
        ]);

        try {
            $discussion = Discussion::find($id);

            $reply = new Replies();
            $reply->discuss_id = $discussion->id;
            $reply->user_id = Auth::user()->id;
            $reply->topic_id = $discussion->topic->id;
            $reply->avatar_id = Auth::user()->id;
            $reply->content = $request->content;
            $reply->save();

            return redirect()->back()->with('success', 'User created successfully!');

        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['discuss'] = Discussion::findOrFail($id);
        $data['topic'] = Topics::all();

        return view('discuss.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'content' => 'required',
            // 'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // validation for uploaded images
        ]);


        try {
            $discuss = Discussion::findOrFail($id);
            $discuss->topic_id = $request->topic_id;
            $discuss->content = $request->content;
            // $discuss->replies_id = $request->replies;

            if ($request->hasFile('image')) {
                $destinationPath = public_path('assets/images/content-discuss/');
                $image = [];

                foreach ($request->file('image') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move($destinationPath, $filename);
                    $image[] = $filename;
                }

                $discuss->image = json_encode($image);
            }

            $discuss->save();


            return redirect()->route('discuss.index')->with('success', 'Discussion created successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Failed to create discussion!');
        }
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
