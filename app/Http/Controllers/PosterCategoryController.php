<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use App\Http\Requests\ListCategoryRequest;
use Illuminate\Http\Request;
use App\Models\ListCategory;
use App\Repositories\ListCategoryRepository;
use Exception;
use App\Models\User;

class PosterCategoryController extends Controller
{
    private $listCategoryRepository;

    function __construct(ListCategoryRepository $listCategoryRepository)
    {
        $this->listCategoryRepository = $listCategoryRepository;
    }

    public function index()
    {
        return view('admin.posters.posters-category.index');
    }

    public function create()
    {
        $postersCategories = ListCategory::where('list_type_id', ListType::POSTER)->where('status', '=', 2)->get();
        return view('admin.posters.posters-category.create', compact('postersCategories'));
    }

    public function store(ListCategoryRequest $request, ListCategory $listCategory)
    {
        try {
            $this->listCategoryRepository->saveCategory($request, $listCategory);
            return redirect()->route('posters-category.index')->with('success', trans('admin.success_save'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $postersCategory = ListCategory::findOrFail($id);
        return view('admin.posters.posters-category.show', compact('postersCategory'));
    }

    public function edit($id)
    {
        $postersCategory = ListCategory::findOrFail($id);
        $postersCategories = ListCategory::where('list_type_id', ListType::POSTER)->where('status', '=', 2)->get();
        return view('admin.posters.posters-category.edit', compact('postersCategory', 'postersCategories'));
    }

    public function update(ListCategoryRequest $request, $id)
    {
        try {
            $this->listCategoryRepository->updateCategory($request, $id);
            return redirect()->route('posters-category.show', $id)->with('success', trans('admin.success_save'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listCategoryRepository->deleteCategory($id);
            return redirect()->route('posters-category.index', $id)->with('success', trans('admin.success_delete'));
        } catch (Exception $error) {
            return redirect()->route('posters-category.index', $id)->with('success', trans('admin.error_save'));
        }
    }
}
