<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        return view('backend.unit.index', ['units' => Unit::all()]);
    }
    public function create()
    {
        return view('backend.unit.create');
    }

    public function store(Request $request)
    {
        Unit::newUnit($request);
        return back()->with('message', 'Unit Created Successfullly');
    }
    public function edit($id)
    {
        return view('backend.unit.edit', ['unit' => Unit::find($id)]);
    }
    public function update(Request $request, $id)
    {
        Unit::updateUnit($request, $id);
        return redirect('/unit')->with('message', 'Unit Info Updated');
    }
    public function delete($id)
    {
        Unit::deleteUnit($id);
        return redirect('/unit')->with('message', 'Unit Info Deleted');
    }
}
