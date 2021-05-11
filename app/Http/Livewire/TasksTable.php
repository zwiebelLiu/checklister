<?php

namespace App\Http\Livewire;

use App\Models\Tasks;
use Livewire\Component;

class TasksTable extends Component
{
    public  $checklist;
    public function render()
    {
        $task=$this->checklist->task()->get();
        return view('livewire.tasks-table',compact('task'));
     }

    public function updateTaskOrder($tasks)
    {
      // dd($tasks);
        foreach($tasks as $task)
        {
           Tasks::find($task['value'])->update(['position'=>$task['order']]);
          // dd('ok');
        }
    }
}
