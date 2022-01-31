<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use App\Http\Requests\ListsLinkRequest;
use App\Models\ListCategory;
use App\Models\Lists;
use App\Repositories\ListsRepository;


class PosterController extends Controller
{
    private $listsRepository;

    function __construct(ListsRepository $listsRepository)
    {
        $this->listsRepository = $listsRepository;
    }

    public function index()
    {
        return view('admin.posters.posters.index');
    }

    public function create()
    {
        $postersCategories = ListCategory::where('list_type_id', ListType::POSTER)->get();
        return view('admin.posters.posters.create', compact('postersCategories'));
    }

    public function store(ListsLinkRequest $request, Lists $lists)
    {
        try {
            $this->listsRepository->saveLists($request, $lists);
            return redirect()->route('posters.index')->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $posters = $this->listsRepository->getById($id);
        return view('admin.posters.posters.show', compact('posters'));
    }

    public function edit($id)
    {
        $posters = $this->listsRepository->getById($id);
        $postersCategories = ListCategory::where('list_type_id', ListType::POSTER)->get();
        return view('admin.posters.posters.edit', compact('posters', 'postersCategories'));
    }

    public function update(ListsLinkRequest $request, $id)
    {
        try {
            $this->listsRepository->updateLists($request, $id);
            return redirect()->route('posters.show', $id)->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listsRepository->deleteLists($id);
            return redirect()->route('posters.index')->with('success', trans('admin.success_delete'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }
}
