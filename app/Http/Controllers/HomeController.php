<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Managements;
use App\Models\ListCategory;
use App\Models\Menu;
use App\Models\MenusCategory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Lists;
use Spatie\Permission\Models\Role;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function darkMode(Request $request)
    {
        if (auth()->user()->dark_mode == 0) {
            User::findOrFail(auth()->user()->id)->update([
                'dark_mode' => 1,
            ]);
        } else {
            User::findOrFail(auth()->user()->id)->update([
                'dark_mode' => 0,
            ]);
        }
        return redirect()->back();
    }

    public function index(Request $request)
    {
        $totalMenus = Menu::count();
        $totalNews = Lists::where('list_type_id', 1)->count();
        $totalPosters = Lists::where('list_type_id', 2)->count();
        $totalAnswers = Lists::where('list_type_id', 3)->count();
        $totalConcerns = Lists::where('list_type_id', 4)->count();
        $totalPages = Lists::where('list_type_id', 5)->count();
        $totalUseful = Lists::where('list_type_id', 6)->count();
        $totalPhotos = Lists::where('list_type_id', 7)->count();
        $totalVideos = Lists::where('list_type_id', 8)->count();
        $totalEvents = Lists::where('list_type_id', 9)->count();
        //        $totalManagements = Management::where('list_type_id', 10)->count();
        $totalRoles = Role::count();
        $totalUsers = User::count();

        return view('admin.index', compact(
            'totalMenus',
            'totalNews',
            'totalPosters',
            'totalAnswers',
            'totalConcerns',
            'totalPages',
            'totalUseful',
            'totalPhotos',
            'totalVideos',
            'totalEvents',
            // 'totalManagements',
            'totalRoles',
            'totalUsers',
        ));
    }
}
