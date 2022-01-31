<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use App\Models\ListCategory;
use App\Http\Requests\ListsLinkRequest;
use App\Models\Lists;
use App\Repositories\ListsRepository;

class UsefulController extends Controller
{
    private $listsRepository;

    function __construct(ListsRepository $listsRepository)
    {
        $this->listsRepository = $listsRepository;
    }

    public function index()
    {
        return view('admin.usefuls.usefuls.index');
    }

    public function create()
    {
        $usefulsCategories = ListCategory::where('list_type_id', ListType::USEFUL)->get();
        return view('admin.usefuls.usefuls.create', compact('usefulsCategories'));
    }

    public function store(ListsLinkRequest $request, Lists $lists)
    {
        try {
            $this->listsRepository->saveLists($request, $lists);
            return redirect()->route('useful.index')->with('success', tr('Successfully saved'));
        } catch (\Throwable $error) {
            dd($error);
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $usefuls = $this->listsRepository->getById($id);
        return view('admin.usefuls.usefuls.show', compact('usefuls'));
    }

    public function edit($id)
    {
        $usefuls = $this->listsRepository->getById($id);
        $usefulsCategories = ListCategory::where('list_type_id', ListType::USEFUL)->get();
        return view('admin.usefuls.usefuls.edit', compact('usefuls', 'usefulsCategories'));
    }

    public function update(ListsLinkRequest $request, $id)
    {
        try {
            $this->listsRepository->updateLists($request, $id);
            return redirect()->route('useful.show', $id)->with('success', tr('Successfully saved'));
        } catch (\Throwable $error) {
            dd($error);
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listsRepository->deleteLists($id);
            return redirect()->route('useful.index')->with('success', tr('Successfully deleted'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }
}
