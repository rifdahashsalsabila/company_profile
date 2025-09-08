<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAbouController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::all();
        return view('admin.about.index', compact('about'));
     }
  
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $about =About::first();
        $data = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            //'cover' => 'required',
            // 'urutan' => 'required',
            // 'gambar' => 'required',
        ]);

    

        // upload gambar
        if ($request->hasFile('cover')) {

            if ($about->cover != null) {
                unlink($about->cover);
             }

            $cover = $request->file('cover');
            $file_name = time() . '-' . $cover->getClientOriginalName();

            $storage = 'uploads/images/';
            $cover->move($storage, $file_name);
            $data['cover'] = $storage . $file_name;
        } else {
            $data['cover'] = $about->cover;
        }



        $about->update($data);
        Alert::success('Success', 'Berhasil update');
        return redirect('/admin/about');
    }

    }
    
   