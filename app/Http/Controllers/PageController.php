<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use App\Http\Requests\ListsRequest;
use App\Models\ListCategory;
use App\Models\Lists;
use App\Repositories\ListsRepository;


class PageController extends Controller
{
    private $listsRepository;

    function __construct(ListsRepository $listsRepository)
    {
        $this->listsRepository = $listsRepository;
    }

    public function index()
    {
        return view('admin.pages.pages.index');
    }

    public function create()
    {
        $pagesCategories = ListCategory::where('list_type_id', ListType::PAGE)->get();
        return view('admin.pages.pages.create', compact('pagesCategories'));
    }

    public function store(ListsRequest $request, Lists $lists)
    {
        try {
            $this->listsRepository->saveLists($request, $lists);
            return redirect()->route('pages.index')->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $pages = $this->listsRepository->getById($id);
        return view('admin.pages.pages.show', compact('pages'));
    }

    public function edit($id)
    {
        $pages = $this->listsRepository->getById($id);
        $pagesCategories = ListCategory::where('list_type_id', ListType::PAGE)->get();
        return view('admin.pages.pages.edit', compact('pages', 'pagesCategories'));
    }

    public function update(ListsRequest $request, $id)
    {
        try {
            $this->listsRepository->updateLists($request, $id);
            return redirect()->route('pages.show', $id)->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listsRepository->deleteLists($id);
            return redirect()->route('pages.index')->with('success', trans('admin.success_delete'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }
}
