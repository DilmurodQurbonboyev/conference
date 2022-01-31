<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use Illuminate\Http\Request;
use App\Models\ListCategory;
use App\Models\Lists;
use App\Repositories\ListsRepository;

class VideoController extends Controller
{
    private $listsRepository;

    function __construct(ListsRepository $listsRepository)
    {
        $this->listsRepository = $listsRepository;
    }

    public function index()
    {
        return view('admin.videos.videos.index');
    }

    public function create()
    {
        $videosCategories = ListCategory::where('list_type_id', ListType::VIDEO)->get();
        return view('admin.videos.videos.create', compact('videosCategories'));
    }

    public function store(Request $request, Lists $lists)
    {
        try {
            $this->listsRepository->saveLists($request, $lists);
            return redirect()->route('videos.index')->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $videos = $this->listsRepository->getById($id);
        return view('admin.videos.videos.show', compact('videos'));
    }

    public function edit($id)
    {
        $videos = $this->listsRepository->getById($id);
        $videosCategories = ListCategory::where('list_type_id', ListType::VIDEO)->get();
        return view('admin.videos.videos.edit', compact('videos', 'videosCategories'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->listsRepository->updateLists($request, $id);
            return redirect()->route('videos.show', $id)->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listsRepository->deleteLists($id);
            return redirect()->route('videos.index')->with('success', trans('admin.success_delete'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }
}
