<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use App\Http\Requests\ListsRequest;
use App\Models\ListCategory;
use App\Models\Lists;
use App\Repositories\ListsRepository;

class AnswerController extends Controller
{
    private $listsRepository;

    function __construct(ListsRepository $listsRepository)
    {
        $this->listsRepository = $listsRepository;
    }

    public function index()
    {
        return view('admin.answers.answers.index');
    }

    public function create()
    {
        $answersCategories = ListCategory::where('list_type_id', ListType::ANSWER)->get();
        return view('admin.answers.answers.create', compact('answersCategories'));
    }


    public function store(ListsRequest $request, Lists $lists)
    {
        try {
            $this->listsRepository->saveLists($request, $lists);
            return redirect()->route('answers.index')->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $answers = $this->listsRepository->getById($id);
        return view('admin.answers.answers.show', compact('answers'));
    }

    public function edit($id)
    {
        $answers = $this->listsRepository->getById($id);
        $answersCategories = ListCategory::where('list_type_id', ListType::ANSWER)->get();
        return view('admin.answers.answers.edit', compact('answersCategories', 'answers'));
    }

    public function update(ListsRequest  $request, $id)
    {
        try {
            $this->listsRepository->updateLists($request, $id);
            return redirect()->route('answers.show', $id)->with('success', trans('admin.success_save'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->listsRepository->deleteLists($id);
            return redirect()->route('answers.index')->with('success', trans('admin.success_delete'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }
}
