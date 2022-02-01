<?php

namespace App\Http\Controllers;

use OwenIt\Auditing\Models\Audit;

class LogController extends Controller
{
    public function index()
    {
        return view('admin.logs.index');
    }

    public function show($id)
    {
        $logs = Audit::findOrFail($id);
        return view('admin.logs.show', compact('logs'));
    }
}
