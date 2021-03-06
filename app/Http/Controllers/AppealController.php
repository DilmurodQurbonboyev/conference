<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\Lists;
use App\Models\Register;
use App\Models\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function create()
    {
        $link = Lists::where('lists_category_id', 12)->first();
        $onlineUsers = Register::where('status', 2)->paginate(20);
        return view('admin.appeals.create', compact('onlineUsers', 'link'));
    }

    public function store(Request $request)
    {
        $data = [
            'image' => $request->file('image')
        ];

        if (!empty($request->file('image')) && !empty($request->users)) {
            try {

                foreach ($request->users as $user) {
                    $register = Register::find($user);
                    if ($register) {
                        Mail::to($register->email)->send(new RegisterMail($data));
                        $result = new SendEmail();
                        $result->register_id = $register->id;
                        $result->fullName = $register->fullName;
                        $result->email = $register->email;
//                        $result->link = $request->link;
                        $result->status = 1;
                        if (!$result->save()) {
                            break;
                        }
                    } else {
                        dd($user);
                    }
                }
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }
        return redirect()->back()->with('success', 'Zoom link send to users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appeal = Register::findOrFail($id);
        $sendEmail = SendEmail::where('register_id', $appeal->id)->get();
        $count = SendEmail::where('register_id', $appeal->id)->count();

        return view('admin.appeals.show', compact('appeal', 'sendEmail', 'count'));
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

        return redirect()->route('appeals.index')->with('success', tr('Successfully deleted'));
    }
}
