<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use App\Http\Requests\ListsLinkRequest;
use App\Models\ListCategory;
use App\Models\User;
use App\Models\Lists;
use App\Repositories\ListsRepository;

class ConcernController extends Controller
{
    private $listsRepository;

    function __construct(ListsRepository $listsRepository)
    {
        $this->listsRepository = $listsRepository;
    }

    public function index()
    {
        return view('admin.concerns.concerns.index');
    }

    public function create()
    {
        $concernsCategories = ListCategory::where('list_type_id', ListType::CONCERN)->get();
        return view('admin.concerns.concerns.create', compact('concernsCategories'));
    }

    public function store(ListsLinkRequest $request, Lists $lists)
    {
        try {
            $this->listsRepository->saveLists($request, $lists);
            return redirect()->route('concerns.index')->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $concerns = $this->listsRepository->getById($id);
        return view('admin.concerns.concerns.show', compact('concerns'));
    }

    public function edit($id)
    {
        $concerns = $this->listsRepository->getById($id);
        $concernsCategories = ListCategory::where('list_type_id', ListType::CONCERN)->get();
        return view('admin.concerns.concerns.edit', compact('concerns', 'concernsCategories'));
    }

    public function update(ListsLinkRequest $request, $id)
    {
        try {
            $this->listsRepository->updateLists($request, $id);
            return redirect()->route('concerns.show', $id)->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listsRepository->deleteLists($id);
            return redirect()->route('concerns.index')->with('success', trans('admin.success_delete'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }
}
