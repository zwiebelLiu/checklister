<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Checklist;
use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    protected  $errorBag='storeTask';


    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTaskRequest $request
     * @param Checklist $checklist
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request,Checklist $checklist)
    {
        //
        $checklist->task()->create($request->validated());
        return redirect()->route('admin.checklist_group.checklists.edit',
        [$checklist->checklist_group_id,$checklist]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Checklist $checklist
     * @param  Tasks $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(Checklist $checklist, $tasks)
    {

       $task= Tasks::find($tasks);
   //dd($tasks);
        return view('admin.Tasks.edit',compact('checklist','task'));
    }

    /**
     * Update the specified resource in storage.
     * @param StoreTaskRequest $request
     * @param  Checklist $checklist
     * @param  Tasks $tasks
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTaskRequest $request, Checklist $checklist, $tasks)
    {

       // dd($tasks);
        Tasks::find($tasks)->update($request->validated());
        return redirect()->route('admin.checklist_group.checklists.edit',
                                 [$checklist->checklist_group_id,$checklist]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Checklist $checklist
     * @param  Tasks $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checklist $checklist, $tasks)
    {
       //Tasks::find($tasks)->delete();

        //dd($tasks);
      //  $tasks->delete();
        Tasks::find($tasks)->delete();
        return redirect()->route('admin.checklist_group.checklists.edit',
                                 [$checklist->checklist_group_id,$checklist]);
    }
}
