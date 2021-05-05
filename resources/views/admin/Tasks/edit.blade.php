@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
     <div class="row">
        <div class="col-md-12">
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

            <div class="card-header">{{ __('Edit Task') }} </div>
        <form action="{{route('admin.checklists.tasks.update',[$checklist,$task])}}" method="POST">
            @csrf
            @method('PUT')
                <div class="card-body">
                <div class="form-group">
                    <label for="name">{{ __('Name')}}</label>
                    <input value="{{$task->name}}" class="form-control" name="name" type="text" >
                </div>
                <div class="form-group">
                    <label for="name">{{ __('Descrption')}}</label>
                    <textarea name="description" class="form-control" id="task_text" rows="9">{{$task->description}}</textarea>

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
