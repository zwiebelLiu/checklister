<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChecklistRequest;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ChecklistGroup $checklistGroup)
    {
        //
        return view('admin.Checklist.create',compact('checklistGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreChecklistRequest $checklistRequest
     * @param  ChecklistGroup $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChecklistRequest $checklistRequest, ChecklistGroup $checklistGroup)
    {
        //
      //  Checklist::create($checklistRequest->validated());
        $checklistGroup->checklists()->create($checklistRequest->validated());
        return redirect()->route('home');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Checklist $checklist
     * @param  ChecklistGroup $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        //
        return view('admin.Checklist.edit',compact('checklist','checklistGroup'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreChecklistRequest $request
     * @param  Checklist $checklist
     * @param  ChecklistGroup $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function update(StoreChecklistRequest $request, ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->update($request->validated());
      return  redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Checklist $checklist
     * @param  ChecklistGroup $checklistGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        //
        $checklist->delete();
        return redirect()->route('home');
    }
}
