<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use App\Http\Requests\ListCategoryRequest;
use App\Models\ListCategory;
use App\Repositories\ListCategoryRepository;


class PhotoCategoryController extends Controller
{
    private $listCategoryRepository;

    function __construct(ListCategoryRepository $listCategoryRepository)
    {
        $this->listCategoryRepository = $listCategoryRepository;
    }

    public function index()
    {
        return view('admin.photos.photos-category.index');
    }

    public function create()
    {
        $photosCategories = ListCategory::where('list_type_id', ListType::PHOTO)->where('status', '=', 2)->get();
        return view('admin.photos.photos-category.create', compact('photosCategories'));
    }

    public function store(ListCategoryRequest $request, ListCategory $listCategory)
    {
        try {
            $this->listCategoryRepository->saveCategory($request, $listCategory);
            return redirect()->route('photos-category.index')->with('success', tr('Successfully saved'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $photosCategory = ListCategory::findOrFail($id);
        return view('admin.photos.photos-category.show', compact('photosCategory'));
    }

    public function edit($id)
    {
        $photosCategory = ListCategory::findOrFail($id);
        $photosCategories = ListCategory::where('list_type_id', ListType::PHOTO)->where('status', '=', 2)->get();
        return view('admin.photos.photos-category.edit', compact('photosCategory', 'photosCategories'));
    }

    public function update(ListCategoryRequest $request, $id)
    {
        try {
            $this->listCategoryRepository->updateCategory($request, $id);
            return redirect()->route('photos-category.show', $id)->with('success', tr('Successfully saved'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listCategoryRepository->deleteCategory($id);
            return redirect()->route('photos-category.index', $id)->with('success', tr('Successfully deleted'));
        } catch (\Throwable $error) {
            return redirect()->route('photos-category.index', $id)->with('success', trans('admin.error_save'));
        }
    }
}
