<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class AdminBannerController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            // 'title' => 'Manajemen banner',
            'banner' => banner::get(),
            'content' => 'admin/banner/index'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = [
            'title' => 'Tambah banner',
            'content' => 'admin/banner/add'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $data = $request->validate([
            'headline' => 'required',
            'desc' => 'required',
            // 'urutan' => 'required',
            'gambar' => 'required',
        ]);

        $data['urutan'] = 0;
        // upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $file_name = time() . '-' . $gambar->getClientOriginalName();

            $storage = 'uploads/banners/';
            $gambar->move($storage, $file_name);
            $data['gambar'] = $storage . $file_name;
        } else {
            $data['gambar'] = null;
        }

        banner::create($data);
        Alert::success('Success', 'Data ditambahkan');
        return redirect('/admin/banner');
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
        //
        $data = [
            'title' => 'Edit banner',
            'banner' => Banner::find($id),
            'content' => 'admin/banner/add'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $banner = Banner::find($id);
        $data = $request->validate([
            'headline' => 'required',
            'desc' => 'required',
            // 'urutan' => 'required',
            // 'gambar' => 'required',
        ]);

        $data['urutan'] = 0;

        // upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $file_name = time() . '-' . $gambar->getClientOriginalName();

            $storage = 'uploads/banners/';
            $gambar->move($storage, $file_name);
            $data['gambar'] = $storage . $file_name;
        } 



        $banner->update($data);
        Alert::success('Success', 'Berhasil update');
        return redirect('/admin/banner');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $banner = banner::find($id);

        if ($banner->gambar != null) {
            unlink($banner->gambar);
        }

        $banner->delete();
        Alert::success('Success', 'Berhasil dihapus');
        return redirect('/admin/banner');
    }
}
