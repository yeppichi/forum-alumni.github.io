<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['category'] = Categories::all();

        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['category'] = Categories::all();

        return view('admin.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'image' => 'nullable',
            'school_generation' => 'required',
            'three_years' => 'required',
            'four_years' => 'required',
        ]);

        try{
            $category = new Categories();
            $category->school_generation = $request->school_generation;
            $category->three_years = $request->three_years;
            $category->four_years = $request->four_years;

            // Check if a new avatar image file has been uploaded
            if ($request->hasFile('image')) {
                $destinationPath = public_path('assets/images/image-category/');

                // Move the new image image file to the storage directory
                $image = $request->file('image');
                $image->move($destinationPath, $image->getClientOriginalName());

                // Set the new image file name to the category
                $category->image = $image->getClientOriginalName();
            } else {
                // Set the default image file name to the category
                $category->image = 'default.jpg';
            }

            $category->save();

            return redirect()->route('admin.category.index')->with('success', 'Category created successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
        }
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
        $data['category'] = Categories::findOrFail($id);

        return view('admin.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'image' => 'nullable',
            'school_generation' => 'required',
            'three_years' => 'required',
            'four_years' => 'required',
        ]);

        try {
            $category = Categories::findOrFail($id);
            $category->school_generation = $request->school_generation;
            $category->three_years = $request->three_years;
            $category->four_years = $request->four_years;

            // Check if a new image image file has been uploaded
            if ($request->hasFile('image')) {
                $destinationPath = public_path('assets/images/image-category/');

                // Delete the old image image file from storage
                if ($category->image && Storage::exists('public/assets/images/image-category/' . $category->image)) {
                    Storage::delete('public/assets/images/image-category/' . $category->image);
                }

                // Move the new image image file to the storage directory
                $image = $request->file('image');
                $image->move($destinationPath, $image->getClientOriginalName());

                // Set the new image file name to the category
                $category->image = $image->getClientOriginalName();
            }


            $category->save();

            return redirect()->route('admin.category.index')->with('success', 'Category created successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', $th->getMessage());
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
