<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use App\Http\Requests\ListCategoryRequest;
use Illuminate\Http\Request;
use App\Models\ListCategory;
use App\Repositories\ListCategoryRepository;
use Exception;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;


class PageCategoryController extends Controller
{
    private $listCategoryRepository;

    function __construct(ListCategoryRepository $listCategoryRepository)
    {
        $this->listCategoryRepository = $listCategoryRepository;
    }

    public function index()
    {
        return view('admin.pages.pages-category.index');
    }

    public function create()
    {
        $pagesCategories = ListCategory::where('list_type_id', ListType::PAGE)->where('status', '=', 2)->get();
        return view('admin.pages.pages-category.create', compact('pagesCategories'));
    }

    public function store(ListCategoryRequest $request, ListCategory $listCategory)
    {
        try {
            $this->listCategoryRepository->saveCategory($request, $listCategory);
            return redirect()->route('pages-category.index')->with('success', trans('admin.success_save'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $pagesCategory = ListCategory::findOrFail($id);
        return view('admin.pages.pages-category.show', compact('pagesCategory'));
    }

    public function edit($id)
    {
        $pagesCategory = ListCategory::findOrFail($id);
        $pagesCategories = ListCategory::where('list_type_id', ListType::PAGE)->where('status', '=', 2)->get();
        return view('admin.pages.pages-category.edit', compact('pagesCategory', 'pagesCategories'));
    }

    public function update(ListCategoryRequest $request, $id)
    {
        try {
            $this->listCategoryRepository->updateCategory($request, $id);
            return redirect()->route('pages-category.show', $id)->with('success', trans('admin.success_save'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listCategoryRepository->deleteCategory($id);
            return redirect()->route('pages-category.index', $id)->with('success', trans('admin.success_delete'));
        } catch (Exception $error) {
            return redirect()->route('pages-category.index', $id)->with('success', trans('admin.error_save'));
        }
    }
}
