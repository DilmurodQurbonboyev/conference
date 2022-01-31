<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use App\Http\Requests\ListCategoryRequest;
use App\Models\ListCategory;
use App\Repositories\ListCategoryRepository;
use Throwable;

class EventCategoryController extends Controller
{
    private $listCategoryRepository;

    function __construct(ListCategoryRepository $listCategoryRepository)
    {
        $this->listCategoryRepository = $listCategoryRepository;
    }

    public function index()
    {
        return view('admin.events.events-category.index');
    }

    public function create()
    {
        $eventsCategories = ListCategory::where('list_type_id', ListType::EVENT)->where('status', '=', 2)->get();
        return view('admin.events.events-category.create', compact('eventsCategories'));
    }

    public function store(ListCategoryRequest $request, ListCategory $listCategory)
    {
        try {
            $this->listCategoryRepository->saveCategory($request, $listCategory);
            return redirect()->route('events-category.index')->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $eventsCategory = $this->listCategoryRepository->getById($id);
        return view('admin.events.events-category.show', compact('eventsCategory'));
    }

    public function edit($id)
    {
        $eventsCategory = $this->listCategoryRepository->getById($id);
        $eventsCategories = ListCategory::where('list_type_id', ListType::EVENT)->where('status', 2)->get();
        return view('admin.events.events-category.edit', compact('eventsCategory', 'eventsCategories'));
    }

    public function update(ListCategoryRequest $request, $id)
    {
        try {
            $this->listCategoryRepository->updateCategory($request, $id);
            return redirect()->route('events-category.show', $id)->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listCategoryRepository->deleteCategory($id);
            return redirect()->route('events-category.index')->with('success', trans('admin.success_delete'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }
}
