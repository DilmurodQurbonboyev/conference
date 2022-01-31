<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListsRequest;
use App\Models\ListCategory;
use App\Models\Lists;
use App\Repositories\ListsRepository;
use App\Helpers\ListType;


class NewsController extends Controller
{
    private $listsRepository;

    public function __construct(ListsRepository $listsRepository)
    {
        $this->listsRepository = $listsRepository;
    }

    public function index()
    {
        return view('admin.news.news.index');
    }

    public function create()
    {
        $newsCategories = ListCategory::where('list_type_id', ListType::NEWS)->get();
        return view('admin.news.news.create', compact('newsCategories'));
    }

    public function store(ListsRequest $request, Lists $lists)
    {
        try {
            $this->listsRepository->saveLists($request, $lists);
            return redirect()->route('news.index')->with('success', tr('Succesfully saved'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $news = $this->listsRepository->getById($id);
        return view('admin.news.news.show', compact('news'));
    }

    public function edit($id)
    {
        $news = $this->listsRepository->getById($id);
        $newsCategories = ListCategory::where('list_type_id', ListType::NEWS)->get();
        return view('admin.news.news.edit', compact('news', 'newsCategories'));
    }

    public function update(ListsRequest $request, $id)
    {
        try {
            $this->listsRepository->updateLists($request, $id);
            return redirect()->route('news.show', $id)->with('success', tr('Succesfully saved'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listsRepository->deleteLists($id);
            return redirect()->route('news.index')->with('success', tr('Succesfully deleted'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }
}
