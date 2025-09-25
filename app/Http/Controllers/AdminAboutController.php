<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'desc'  => 'required|string',
        ]);

        $data = $request->all();

        // Handle upload file
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/about'), $filename);
            $data['cover'] = 'uploads/about/' . $filename;
        }

        About::create($data);

        return redirect()->route('about.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
{
    $about = About::first();

    $data = $request->validate([
        'desc' => 'required',
        'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('cover')) {
        // hapus file lama
        if ($about->cover && file_exists(public_path($about->cover))) {
            unlink(public_path($about->cover));
        }

        $cover = $request->file('cover');
        $file_name = time() . '-' . $cover->getClientOriginalName();

        $storage = 'uploads/about/';
        $cover->move(public_path($storage), $file_name);
        $data['cover'] = $storage . $file_name;
    } else {
        $data['cover'] = $about->cover;
    }

    $about->update($data);

    Alert::success('Success', 'Data berhasil diupdate');
    return redirect()->route('about.index');
}

}
    
    
   