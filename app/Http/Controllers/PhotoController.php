<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use Illuminate\Http\Request;
use App\Models\ListCategory;
use App\Models\Lists;
use App\Repositories\ListsRepository;

class PhotoController extends Controller
{
    private $listsRepository;

    function __construct(ListsRepository $listsRepository)
    {
        $this->listsRepository = $listsRepository;
    }

    public function index()
    {
        return view('admin.photos.photos.index');
    }

    public function create()
    {
        $photosCategories = ListCategory::where('list_type_id', ListType::PHOTO)->get();
        return view('admin.photos.photos.create', compact('photosCategories'));
    }

    public function store(Request $request, Lists $lists)
    {
        try {
            $this->listsRepository->saveLists($request, $lists);
            return redirect()->route('photos.index')->with('success', tr('Successfully saved'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $photos = $this->listsRepository->getById($id);
        return view('admin.photos.photos.show', compact('photos'));
    }

    public function edit($id)
    {
        $photos = $this->listsRepository->getById($id);
        $photosCategories = ListCategory::where('list_type_id', ListType::PHOTO)->get();
        return view('admin.photos.photos.edit', compact('photos', 'photosCategories'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->listsRepository->updateLists($request, $id);
            return redirect()->route('photos.show', $id)->with('success', tr('Successfully saved'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listsRepository->deleteLists($id);
            return redirect()->route('photos.index')->with('success', tr('Successfully deleted'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }
}
