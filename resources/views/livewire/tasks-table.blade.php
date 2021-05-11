<table class="table table-responsive-sm" wire:sortable="updateTaskOrder" xmlns:wire="http://www.w3.org/1999/xhtml">
    <tbody>

    @foreach($task as $tasks)
        <tr wire:sortable.item="{{ $tasks->id }}" wire:key="task-{{ $tasks->id }}">
            <td>{{$tasks->name}}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{route('admin.checklists.tasks.edit',[$checklist,$tasks])}}">{{__('Edit')}}</a>
                <form style="display: inline;" action="{{route('admin.checklists.tasks.destroy',[$checklist,$tasks])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger"
                            onclick="return confirm('{{__('Are u sure?')}}')"
                            type="submit">{{__('Delete this Task')}}</button>
                </form>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
