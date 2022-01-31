<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use App\Http\Requests\ListCategoryRequest;
use App\Models\ListCategory;
use App\Repositories\ListCategoryRepository;

class ConcernCategoryController extends Controller
{
    private $listCategoryRepository;

    function __construct(ListCategoryRepository $listCategoryRepository)
    {
        $this->listCategoryRepository = $listCategoryRepository;
    }

    public function index()
    {
        return view('admin.concerns.concerns-category.index');
    }

    public function create()
    {
        $concernsCategories = ListCategory::where('list_type_id', ListType::CONCERN)->where('status', 2)->get();
        return view('admin.concerns.concerns-category.create', compact('concernsCategories'));
    }

    public function store(ListCategoryRequest $request, ListCategory $listCategory)
    {
        try {
            $this->listCategoryRepository->saveCategory($request, $listCategory);
            return redirect()->route('concerns-category.index')->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $concernsCategory = $this->listCategoryRepository->getById($id);
        return view('admin.concerns.concerns-category.show', compact('concernsCategory'));
    }

    public function edit($id)
    {
        $concernsCategory = $this->listCategoryRepository->getById($id);
        $concernsCategories = ListCategory::where('list_type_id', ListType::CONCERN)->where('status', '=', 2)->get();
        return view('admin.concerns.concerns-category.edit', compact('concernsCategory', 'concernsCategories'));
    }

    public function update(ListCategoryRequest $request, $id)
    {
        try {
            $this->listCategoryRepository->updateCategory($request, $id);
            return redirect()->route('concerns-category.show', $id)->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listCategoryRepository->deleteCategory($id);
            return redirect()->route('concerns-category.index')->with('success', trans('admin.success_delete'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }
}
