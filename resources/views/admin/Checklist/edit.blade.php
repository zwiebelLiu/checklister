@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('admin.checklist_group.checklists.update',[$checklistGroup,$checklist])}}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="card-header">{{ __('Edit Checklist') }} </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">{{ __('Name')}}</label>
                        <input value="{{$checklist->name}}" class="form-control" name="name" type="text" placeholder="{{__('Checklist Name')}}">
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit"> {{__('Save Checklist')}}</button>
                </div>
                </form>
            </div>
            <form action="{{route('admin.checklist_group.checklists.destroy',[$checklistGroup,$checklist])}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger"
                        onclick="return confirm('{{__('Are u sure?')}}')"
                        type="submit">{{__('Delete this Checklist')}}</button>
            </form>

        </div>
        </div>
        <hr>

            <div class="card">
                <div class="card-header"> {{__('List of Tasks')}}</div>
                <div class="card-body">
                    @livewire('tasks-table',['checklist'=>$checklist])

                </div>
            </div>
        <div class="card">
        @if ($errors->storeTask->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->storeTask->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="card-header">{{ __('New Task') }} </div>
        <form action="{{route('admin.checklists.tasks.store',[$checklist])}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">{{ __('Name')}}</label>
                    <input value="{{old('name')}}" class="form-control" name="name" type="text" >
                </div>
                <div class="form-group">
                    <label for="name">{{ __('Descrption')}}</label>
                    <textarea name="description" class="form-control" id="task_text" rows="5">{{old('description')}}</textarea>

                </div>
            </div>
            <div class="card-footer">
               <button class="btn btn-sm btn-primary" type="submit"> {{__('Save Task')}}</button>
            </div>
        </form>
    </div>
   </div>

</div>
@endsection

@section('script')
    <script>
        ClassicEditor
            .create( document.querySelector( '#task_text' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
