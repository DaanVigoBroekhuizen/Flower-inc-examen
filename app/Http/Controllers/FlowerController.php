<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use App\Models\WarehouseFlower;
use Illuminate\Http\Request;

class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flowers = Flower::all();
        return view('flowers.index', compact('flowers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flowers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('img');
        $image->move(public_path('images/flowers'), $image->getClientOriginalName());
        $flower = new Flower();
        $flower->name = $request->name;
        $flower->img = $image->getClientOriginalName();
        $flower->save();

        return redirect()->route('flowers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warehouses = WarehouseFlower::where('flower_id', $id)->get();

        return view('flowers.seeWarehouses', compact('warehouses', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flower = Flower::find($id);
        return view('flowers.edit', compact('flower'));
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
        $flower = Flower::find($id);
        $flower->name = $request->name;
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $image->move(public_path('images/flowers'), $image->getClientOriginalName());
            $flower->img = $image->getClientOriginalName();
        }
            $flower->save();

        return redirect()->route('flowers.index')->with('success', 'Flower updated successfully');
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
    }
}
