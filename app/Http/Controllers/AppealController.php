<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;


class AppealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.appeals.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appeal = Register::findOrFail($id);
        return view('admin.appeals.edit', compact('appeal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $appeal = [
            'status' => $request->status,
        ];

        Register::findOrFail($id)->update($appeal);

        return redirect()->route('appeals.index')->with('success', tr('Successfully saved'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appeal = Register::findOrFail($id);

        if ($appeal->photo) {
            unlink($appeal->photo);
        }

        $appeal->delete();
        return redirect()->route('appeals.index')->with('success', 'Successfully deleted');
    }
}
