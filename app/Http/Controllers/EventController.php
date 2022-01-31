<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use Illuminate\Http\Request;
use App\Models\ListCategory;
use App\Repositories\ListsRepository;
use App\Models\Lists;



class EventController extends Controller
{
    private $listsRepository;

    function __construct(ListsRepository $listsRepository)
    {
        $this->listsRepository = $listsRepository;
    }

    public function index()
    {
        return view('admin.events.events.index');
    }

    public function create()
    {
        $eventsCategories = ListCategory::where('list_type_id', ListType::EVENT)->get();
        return view('admin.events.events.create', compact('eventsCategories'));
    }

    public function store(Request $request, Lists $lists)
    {
        try {
            $this->listsRepository->saveLists($request, $lists);
            return redirect()->route('events.index')->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $events = $this->listsRepository->getById($id);
        return view('admin.events.events.show', compact('events'));
    }

    public function edit($id)
    {
        $events = $this->listsRepository->getById($id);
        $eventsCategories = ListCategory::where('list_type_id', ListType::EVENT)->get();
        return view('admin.events.events.edit', compact('events', 'eventsCategories'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->listsRepository->updateLists($request, $id);
            return redirect()->route('events.show', $id)->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listsRepository->deleteLists($id);
            return redirect()->route('events.index')->with('success', trans('admin.success_delete'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }
}
