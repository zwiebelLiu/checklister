<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Checklist;
use App\Models\Tasks;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    protected  $errorBag='storeTask';

    public function store(StoreTaskRequest $request,Checklist $checklist) : RedirectResponse
    {
        $position=$checklist->task()->max('position')+1;
        $checklist->task()->create($request->validated()+['position'=>$position]);
        return redirect()->route('admin.checklist_group.checklists.edit',
        [$checklist->checklist_group_id,$checklist]);
    }

    public function edit(Checklist $checklist, $tasks):View
    {
        $task= Tasks::find($tasks);
        return view('admin.Tasks.edit',compact('checklist','task'));
    }

    public function update(StoreTaskRequest $request, Checklist $checklist, $tasks):RedirectResponse
    {
        Tasks::find($tasks)->update($request->validated());
        return redirect()->route('admin.checklist_group.checklists.edit',
                                 [$checklist->checklist_group_id,$checklist]);
    }

    public function destroy(Checklist $checklist, $tasks):RedirectResponse
    {
        $checklist->task()->where('position','>',Tasks::find($tasks)->position)->update(['position'=>\DB::raw('position -1')]);
        Tasks::find($tasks)->delete();
        return redirect()->route('admin.checklist_group.checklists.edit',
                                 [$checklist->checklist_group_id,$checklist]);
    }
}
