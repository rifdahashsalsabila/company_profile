<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminService extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $service=Service::all();
        return view('admin.service.index', compact('service'));

        
        $data = [
            // 'title' => 'Manajemen Service',
            'service' => Service::get(),
            'content' => 'admin.service.index'
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
            'title' => 'Tambah Service',
            'content' => 'admin/service/add'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'icon'  => 'nullable|string|max:255',
        'desc'  => 'nullable|string',
    ]);

    Service::create([
        'title' => $request->title,
        'icon'  => $request->icon,
        'desc'  => $request->desc,
    ]);

    return redirect()->route('service.index')->with('success', 'Data berhasil disimpan');
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
            'title' => 'Edit service$service',
            'service' => Service::find($id),
            'content' => 'admin/service/add'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $service = Service::find($id);
        $data = $request->validate([
           'title' => 'required',
            'icon' => 'required',
            'desc' => 'required',
           
        ]);



        $service->update($data);
        return redirect('/admin/service');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $service = Service::find($id);
        $service->delete();
        Alert::success('Success Title', 'Success Message');
        return redirect('/admin/service');
    }
}
