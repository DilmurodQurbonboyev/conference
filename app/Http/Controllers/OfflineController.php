<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\SendEmail;
use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Lists;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterAddress;

class OfflineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.offline.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $link = Lists::where('lists_category_id', 13)->first();
        $onlineUsers = Register::where('status', 2)->get();
        $offlineUsers = Register::where('status', 1)->get();

        return view('admin.offline.create', compact('onlineUsers', 'link', 'offlineUsers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->link) {
            foreach ($request->users as $user) {
                $registers = Register::find($user);
                Mail::to($registers->email)->send(new RegisterAddress($request->link));
                $result = new SendEmail();
                $result->register_id = $registers->id;
                $result->fullName = $registers->fullName;
                $result->email = $registers->email;
                $result->link = $request->link;
                $result->status = 1;
                $result->save();
            }
            return redirect()->back()->with('success', 'Address link send to users');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appeal = Register::findOrFail($id);
        $sendEmail = SendEmail::where('register_id', $appeal->id)->get();
        $count = SendEmail::where('register_id', $appeal->id)->count();
        return view('admin.offline.show', compact('appeal', 'sendEmail', 'count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
