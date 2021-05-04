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
                    <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                </div>
                </form>
            </div>
            <form action="{{route('admin.checklist_group.checklists.destroy',[$checklistGroup,$checklist])}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger"
                        onclick="return confirm('{{__('Are u sure?')}}')"
                        type="submit">{{__('Delete')}}</button>
            </form>

        </div>
        </div>
    </div>
</div>
@endsection
