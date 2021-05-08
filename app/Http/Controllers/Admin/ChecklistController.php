<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistRequest;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class ChecklistController extends Controller
{
    protected $errorBag='storeChecklist';

    public function create(ChecklistGroup $checklistGroup):View
    {
        return view('admin.Checklist.create',compact('checklistGroup'));
    }

    public function store(StoreChecklistRequest $checklistRequest, ChecklistGroup $checklistGroup):RedirectResponse
    {
        $checklistGroup->checklists()->create($checklistRequest->validated());
        return redirect()->route('home');
    }

    public function edit(ChecklistGroup $checklistGroup, Checklist $checklist):View
    {
        //
        return view('admin.Checklist.edit',compact('checklist','checklistGroup'));

    }

    public function update(StoreChecklistRequest $request, ChecklistGroup $checklistGroup, Checklist $checklist):RedirectResponse
    {
        $checklist->update($request->validated());
      return  redirect()->route('home');
    }

    public function destroy(ChecklistGroup $checklistGroup, Checklist $checklist):RedirectResponse
    {
        $checklist->delete();
        return redirect()->route('home');
    }
}
