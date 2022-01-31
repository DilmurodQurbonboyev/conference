<?php

namespace App\Http\Controllers;

use App\Helpers\ListType;
use App\Http\Requests\ListCategoryRequest;
use App\Models\MCategory;
use App\Repositories\ManagementCategoryRepository;

class ManagementCategoryController extends Controller
{
    private $managementCategoryRepository;

    function __construct(ManagementCategoryRepository $managementCategoryRepository)
    {
        $this->managementCategoryRepository = $managementCategoryRepository;
    }

    public function index()
    {
        return view('admin.managements.managements-category.index');
    }

    public function create()
    {
        $managementCategories = MCategory::where('status', 2)->get();
        return view('admin.managements.managements-category.create', compact('managementCategories'));
    }

    public function store(ListCategoryRequest $request)
    {
        try {
            $this->managementCategoryRepository->saveMangementsCategory($request);
            return redirect()->route('managements-category.index')->with('success', tr('Successfully saved'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $managementCategory = $this->managementCategoryRepository->getById($id);
        return view('admin.managements.managements-category.show', compact('managementCategory'));
    }

    public function edit($id)
    {
        $managementCategory = $this->managementCategoryRepository->getById($id);
        $managementCategories = MCategory::where('list_type_id', ListType::MANAGEMENT)->where('status', '=', 2)->get();
        return view('admin.managements.managements-category.edit', compact('managementCategory', 'managementCategories'));
    }

    public function update(ListCategoryRequest $request, $id)
    {
        try {
            $this->managementCategoryRepository->updateMangementsCategory($request, $id);
            return redirect()->route('managements-category.show', $id)->with('success', tr('Successfully saved'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->managementCategoryRepository->deleteMangementsCategory($id);
            return redirect()->route('managements-category.index')->with('success', tr('Successfully deleted'));
        } catch (\Throwable $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }
}
