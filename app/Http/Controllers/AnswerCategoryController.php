<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use App\Http\Requests\ListCategoryRequest;
use App\Models\ListCategory;
use App\Repositories\ListCategoryRepository;

class AnswerCategoryController extends Controller
{
    private $listCategoryRepository;

    function __construct(ListCategoryRepository $listCategoryRepository)
    {
        $this->listCategoryRepository = $listCategoryRepository;
    }

    public function index()
    {
        return view('admin.answers.answers-category.index');
    }

    public function create()
    {
        $answersCategories = ListCategory::where('list_type_id', ListType::ANSWER)->where('status', 2)->get();
        return view('admin.answers.answers-category.create', compact('answersCategories'));
    }

    public function store(ListCategoryRequest $request, ListCategory $listCategory)
    {
        try {
            $this->listCategoryRepository->saveCategory($request, $listCategory);
            return redirect()->route('answers-category.index')->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $answersCategory = ListCategory::findOrFail($id);
        return view('admin.answers.answers-category.show', compact('answersCategory'));
    }

    public function edit($id)
    {
        $answersCategory = ListCategory::findOrFail($id);
        $answersCategories = ListCategory::where('list_type_id', '=', ListType::ANSWER)->where('status', '=', 2)->get();
        return view('admin.answers.answers-category.edit', compact('answersCategory', 'answersCategories'));
    }

    public function update(ListCategoryRequest $request, $id)
    {
        try {
            $this->listCategoryRepository->updateCategory($request, $id);
            return redirect()->route('answers-category.show', $id)->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listCategoryRepository->deleteCategory($id);
            return redirect()->route('answers-category.index', $id)->with('success', trans('admin.success_delete'));
        } catch (\Throwable $error) {
            return redirect()->route('answers-category.index', $id)->with('success', trans('admin.error_save'));
        }
    }
}
