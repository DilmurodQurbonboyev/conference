<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public function index()
    {
        return view('admin.logs.index');
    }
}
