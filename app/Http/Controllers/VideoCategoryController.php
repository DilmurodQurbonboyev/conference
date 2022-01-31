<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use App\Http\Requests\ListCategoryRequest;
use App\Models\ListCategory;
use App\Repositories\ListCategoryRepository;
use Exception;

class VideoCategoryController extends Controller
{
    private $listCategoryRepository;

    function __construct(ListCategoryRepository $listCategoryRepository)
    {
        $this->listCategoryRepository = $listCategoryRepository;
    }

    public function index()
    {
        return view('admin.videos.videos-category.index');
    }

    public function create()
    {
        $videosCategories = ListCategory::where('list_type_id', ListType::VIDEO)->where('status', '=', 2)->get();
        return view('admin.videos.videos-category.create', compact('videosCategories'));
    }

    public function store(ListCategoryRequest $request, ListCategory $listCategory)
    {
        try {
            $this->listCategoryRepository->saveCategory($request, $listCategory);
            return redirect()->route('videos-category.index')->with('success', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $videosCategory = ListCategory::findOrFail($id);
        return view('admin.videos.videos-category.show', compact('videosCategory'));
    }

    public function edit($id)
    {
        $videosCategory = ListCategory::findOrFail($id);
        $videosCategories = ListCategory::where('list_type_id', ListType::VIDEO)->where('status', '=', 2)->get();
        return view('admin.videos.videos-category.edit', compact('videosCategory', 'videosCategories'));
    }

    public function update(ListCategoryRequest $request, $id)
    {
        try {
            $this->listCategoryRepository->updateCategory($request, $id);
            return redirect()->route('videos-category.show', $id)->with('success', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listCategoryRepository->deleteCategory($id);
            return redirect()->route('videos-category.index', $id)->with('success', tr('Successfully deleted'));
        } catch (Exception $error) {
            return redirect()->route('videos-category.index', $id)->with('success', trans('admin.error_save'));
        }
    }
}
