<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapRequest;
use App\Models\Map;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.maps.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MapRequest $request)
    {
        $maps = [
            'oz' => [
                'title' => $request->title_oz,
                'address' => $request->address_oz,
            ],
            'uz' => [
                'title' => $request->title_uz,
                'address' => $request->taddressuz,
            ],
            'ru' => [
                'title' => $request->title_ru,
                'address' => $request->address_ru,
            ],
            'en' => [
                'title' => $request->title_en,
                'address' => $request->address_en,
            ],
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => $request->status,
            'user_id' => auth()->id(),
        ];
        Map::create($maps);
        return redirect()->route('maps.index')->with('success', 'Successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $map = Map::findOrFail($id);
        return view('admin.maps.show', compact('map'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $map = Map::findOrFail($id);
        return view('admin.maps.edit', compact('map'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MapRequest $request, $id)
    {
        $maps = [
            'oz' => [
                'title' => $request->title_oz,
                'address' => $request->address_oz,
            ],
            'uz' => [
                'title' => $request->title_uz,
                'address' => $request->taddressuz,
            ],
            'ru' => [
                'title' => $request->title_ru,
                'address' => $request->address_ru,
            ],
            'en' => [
                'title' => $request->title_en,
                'address' => $request->address_en,
            ],
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => $request->status,
            'user_id' => auth()->id(),
        ];
        Map::findOrFail($id)->update($maps);
        return redirect()->route('maps.index')->with('success', 'Successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Map::findOrFail($id)->delete();
        return redirect()->route('maps.index')->with('success', 'Successfully deleted');
    }
}
