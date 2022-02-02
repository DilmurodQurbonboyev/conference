<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagementRequest;
use App\Repositories\ManagementRepository;
use Exception;
use App\Models\Management;
use App\Models\MCategory;

class ManagementController extends Controller
{
    private $managementRepository;

    public function __construct(ManagementRepository $managementRepository)
    {
        $this->managementRepository = $managementRepository;
    }

    public function index()
    {
        $managements = Management::where('list_type_id', '=', 10)->orderBy('id', 'desc')->paginate(15);
        return view('admin.managements.managements.index', compact('managements'));
    }

    public function create()
    {
        $managementCategories = MCategory::where('status', '=', 2)->get();
        return view('admin.managements.managements.create', compact('managementCategories'));
    }

    public function store(ManagementRequest $request)
    {
        try {
            $this->managementRepository->saveManagement($request);
            return redirect()->route('managements.index')->with('success', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function show($id)
    {
        $managements = $this->managementRepository->getById($id);
        return view('admin.managements.managements.show', compact('managements'));
    }

    public function edit($id)
    {
        $managements = $this->managementRepository->getById($id);
        $managementCategories = MCategory::where('status', 2)->get();
        return view('admin.managements.managements.edit', compact('managements', 'managementCategories'));
    }

    public function update(ManagementRequest $request, $id)
    {
        try {
            $this->managementRepository->updateManagement($request, $id);
            return redirect()->route('managements.show', $id)->with('success', tr('Successfully saved'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->managementRepository->deleteManagement($id);
            return redirect()->route('managements.index')->with('success', tr('Successfully deleted'));
        } catch (Exception $error) {
            return redirect()->back()->with('warning', trans('admin.error_save'));
        }
    }
}
