<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MenusCategory;
use App\Http\Requests\MenusCategoryRequest;
use App\Repositories\MenusCategoryRepository;

class MenuCategoryController extends Controller
{
    private $menusCategoryRepository;

    function __construct(MenusCategoryRepository $menusCategoryRepository)
    {
        $this->menusCategoryRepository = $menusCategoryRepository;
    }

    public function index()
    {
        return view('admin.menus.menus-category.index');
    }


    public function create()
    {
        return view('admin.menus.menus-category.create');
    }

    public function store(MenusCategoryRequest $request)
    {
        try {
            $this->menusCategoryRepository->saveCategory($request);
            return redirect()->route('menus-category.index')->with('success', tr('Succesfully saved'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $menusCategory = $this->menusCategoryRepository->getById($id);
        return view('admin.menus.menus-category.show', compact('menusCategory'));
    }

    public function edit($id)
    {
        $menusCategory = $this->menusCategoryRepository->getById($id);
        return view('admin.menus.menus-category.edit', compact('menusCategory'));
    }

    public function update(MenusCategoryRequest $request, $id)
    {
        try {
            $this->menusCategoryRepository->updateCategory($request, $id);
            return redirect()->route('menus-category.show', $id)->with('success', tr('Succesfully saved'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', tr('Something went wrong'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->menusCategoryRepository->deleteCategory($id);
            return redirect()->route('menus-category.index')->with('success', tr('Successfully deleted'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', tr('Something went wrong'));
        }
    }
}
