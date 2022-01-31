<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('admin.messages.index');
    }

    public function create()
    {
        return view('admin.messages.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'oz' => [
                'title' => $request->title_oz,
            ],
            'uz' => [
                'title' => $request->title_uz,
            ],
            'ru' => [
                'title' => $request->title_ru,
            ],
            'en' => [
                'title' => $request->title_en,
            ],
            'key' => $request->key,
        ];
        Message::create($messages);
        return redirect()->route('messages.index')->with('success', tr('Successfully saved'));
    }

    public function show($id)
    {
        $messages = Message::findOrFail($id);
        return view('admin.messages.show', compact('messages'));
    }

    public function edit($id)
    {
        $messages = Message::findOrFail($id);
        return view('admin.messages.edit', compact('messages'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'oz' => [
                'title' => $request->title_oz,
            ],
            'uz' => [
                'title' => $request->title_uz,
            ],
            'ru' => [
                'title' => $request->title_ru,
            ],
            'en' => [
                'title' => $request->title_en,
            ],
            'key' => $request->key,
        ];
        Message::findOrFail($id)->update($messages);
        return redirect()->route('messages.show', $id)->with('success', tr('Successfully saved'));
    }

    public function destroy($id)
    {
        Message::findOrFail($id)->delete();
        return redirect()->route('messages.index')->with('success', tr('Successfully saved'));
    }
}
