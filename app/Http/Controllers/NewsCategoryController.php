<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use App\Http\Requests\ListCategoryRequest;
use App\Repositories\ListCategoryRepository;
use Exception;
use App\Models\ListCategory;


class NewsCategoryController extends Controller
{
    private $listCategoryRepository;

    public function __construct(ListCategoryRepository $listCategoryRepository)
    {
        $this->listCategoryRepository = $listCategoryRepository;
    }

    public function index()
    {
        return view('admin.news.news-category.index');
    }

    public function create()
    {
        $newsCategories = ListCategory::where('list_type_id', ListType::NEWS)->where('status', '=', 2)->get();
        return view('admin.news.news-category.create', compact('newsCategories'));
    }

    public function store(ListCategoryRequest $request, ListCategory $listCategory)
    {
        try {
            $this->listCategoryRepository->saveCategory($request, $listCategory);
            return redirect()->route('news-category.index')->with('success', tr('Succesfully saved'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', tr('Something went wrong'));
        }
    }

    public function show($id)
    {
        $newsCategory = $this->listCategoryRepository->getById($id);
        return view('admin.news.news-category.show', compact('newsCategory'));
    }

    public function edit($id)
    {
        $newsCategory = $this->listCategoryRepository->getById($id);
        $newsCategories = ListCategory::where('list_type_id', ListType::NEWS)->where('status', '=', 2)->get();
        return view('admin.news.news-category.edit', compact('newsCategory', 'newsCategories'));
    }

    public function update(ListCategoryRequest $request, $id)
    {
        try {
            $this->listCategoryRepository->updateCategory($request, $id);
            return redirect()->route('news-category.show', $id)->with('success', tr('Succesfully saved'));
        } catch (Exception $error) {
            dd($error);
            return redirect()->back()->with('warning', tr('Something went wrong'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listCategoryRepository->deleteCategory($id);
            return redirect()->route('news-category.index')->with('success', tr('Successfully deleted'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', tr('Something went wrong'));
        }
    }
}
