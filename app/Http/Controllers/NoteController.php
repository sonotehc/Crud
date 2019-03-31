<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kuycheck;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kuychecks = Kuycheck::latest()->paginate(5);
        return view('noteview.index', compact('kuychecks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('noteview.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'des' => 'required'
        ]);

        Kuycheck::create($request->all());
        return redirect()->route('noteview.index')
            ->with('success', 'new data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $kuycheck = Kuycheck::find($id);
        return view('noteview.detail', compact('kuycheck'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kuycheck = Kuycheck::find($id);
        return view('noteview.edit', compact('kuycheck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'des' => 'required'
        ]);
        $kuycheck = Kuycheck::find($id);
        $kuycheck->name = $request->get('name');
        $kuycheck->des = $request->get('des');
        $kuycheck->save();
        return redirect()->route('noteview.index')
            ->with('success', 'Date updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kuycheck = Kuycheck::find($id);
        $kuycheck->delete();
        return redirect()->route('noteview.index')
            ->with('success', 'Data deleted successfully');
    }
}
