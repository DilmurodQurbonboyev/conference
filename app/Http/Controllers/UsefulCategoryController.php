<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use App\Http\Requests\ListCategoryRequest;
use Illuminate\Http\Request;
use App\Models\ListCategory;
use App\Repositories\ListCategoryRepository;
use Exception;
use App\Models\User;

class UsefulCategoryController extends Controller
{
    private $listCategoryRepository;

    function __construct(ListCategoryRepository $listCategoryRepository)
    {
        $this->listCategoryRepository = $listCategoryRepository;
    }

    public function index()
    {
        return view('admin.usefuls.usefuls-category.index');
    }

    public function create()
    {
        $usefulsCategories = ListCategory::where('list_type_id', ListType::USEFUL)->where('status', '=', 2)->get();
        return view('admin.usefuls.usefuls-category.create', compact('usefulsCategories'));
    }

    public function store(ListCategoryRequest $request, ListCategory $listCategory)
    {
        try {
            $this->listCategoryRepository->saveCategory($request, $listCategory);
            return redirect()->route('useful-category.index')->with('success', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', tr('Something wrong'));
        }
    }

    public function show($id)
    {
        $usefulsCategory = ListCategory::findOrFail($id);
        return view('admin.usefuls.usefuls-category.show', compact('usefulsCategory'));
    }

    public function edit($id)
    {
        $usefulsCategory = ListCategory::findOrFail($id);
        $usefulsCategories = ListCategory::where('list_type_id', ListType::USEFUL)->where('status', '=', 2)->get();
        return view('admin.usefuls.usefuls-category.edit', compact('usefulsCategory', 'usefulsCategories'));
    }

    public function update(ListCategoryRequest $request, $id)
    {
        try {
            $this->listCategoryRepository->updateCategory($request, $id);
            return redirect()->route('useful-category.show', $id)->with('success', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', tr('Something wrong'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listCategoryRepository->deleteCategory($id);
            return redirect()->route('useful-category.index', $id)->with('success', tr('success_delete'));
        } catch (Exception $error) {
            return redirect()->route('useful-category.index', $id)->with('success', tr('Something wrong'));
        }
    }
}
