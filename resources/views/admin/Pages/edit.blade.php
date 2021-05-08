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


            <div class="card-header">{{ __('Edit Pages') }} </div>
        <form action="{{route('admin.pages.update',[$page])}}" method="POST">
            @csrf
            @method('PUT')
                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-info">{{session('message')}}</div>
                    @endif
                <div class="form-group">
                    <label for="title">{{ __('Title')}}</label>
                    <input value="{{$page->title}}" class="form-control" name="title" type="text" >
                </div>
                <div class="form-group">
                    <label for="content">{{ __('Content')}}</label>
                    <textarea name="content" class="form-control" id="task_text" rows="9">{{$page->content}}</textarea>

                </div>
            </div>


            <div class="card-footer">
               <button class="btn btn-sm btn-primary" type="submit"> {{__('Save Page')}}</button>
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
