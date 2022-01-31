<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenusCategory;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use App\Repositories\MenuRepository;
use Exception;


class MenuController extends Controller
{
    private $menuRepository;

    function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function index()
    {
        return view('admin.menus.menus.index');
    }

    public function create()
    {
        $parents = Menu::all();
        $menusCategories = MenusCategory::withTranslation()->get();
        return view('admin.menus.menus.create', compact('parents', 'menusCategories'));
    }

    public function store(MenuRequest $request)
    {
        try {
            $this->menuRepository->saveMenu($request);
            return redirect()->route('menus.index')->with('success', tr('Succesfully saved'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $menu = $this->menuRepository->getById($id);
        return view('admin.menus.menus.show', compact('menu'));
    }

    public function edit($id)
    {
        $parents = Menu::all();
        $menusCategories = MenusCategory::withTranslation()->get();
        $menu = $this->menuRepository->getById($id);
        return view('admin.menus.menus.edit', compact('menu', 'parents', 'menusCategories'));
    }

    public function update(MenuRequest $request, $id)
    {
        try {
            $this->menuRepository->updateMenu($request, $id);
            return redirect()->route('menus.show', $id)->with('success', tr('Succesfully saved'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', tr('Something went wrong'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->menuRepository->deleteMenu($id);
            return redirect()->route('menus.index')->with('success', tr('Successfully deleted'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', tr('Something went wrong'));
        }
    }
}
