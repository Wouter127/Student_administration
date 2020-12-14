<?php

namespace App\Http\Controllers;

use App\Programme;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmes = Programme::get();
        $result = compact('programmes');
        Json::dump($result);
        return view('admin.programmes.index', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programme = new Programme();
        $result = compact('programme');
        return view('admin.programmes.create', $result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3|unique:programmes,name'
        ]);

        $programme = new Programme();
        $programme->name = $request->name;
        $programme->save();
        session()->flash('success', "The programme <b>$programme->name</b> has been added");
        return redirect('admin/programmes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $programmes = Programme::with('courses')->findOrFail($id);
        $result = compact('programmes');
        Json::dump($result);
        return view('admin.programmes.show', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function edit(Programme $programme)
    {
        $result = compact('programme');
        Json::dump($result);
        return view('admin.programmes.edit', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programme $programme)
    {
        $this->validate($request,[
            'name' => 'required|min:3|unique:programmes,name,' . $programme->id
        ]);
        $programme->name = $request->name;
        $programme->save();
        session()->flash('success', 'The programme has been updated');
        return redirect('admin/programmes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programme $programme)
    {
        $programme->delete();
        session()->flash('success', "The programme <b>$programme->name</b> has been deleted");
        return redirect('admin/programmes');
    }
}
