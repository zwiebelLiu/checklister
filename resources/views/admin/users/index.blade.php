@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
     <div class="row" >
         <div class="col-md-12">
          <div class="card">
                <div class="card-header"> {{__('List of Users')}}</div>
                <div class="card-body">
                    <table class="table table-responsive-sm">
                        <tr>
                            <th>{{__('ID')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Website')}}</th>
                            <th>{{__('Create_date')}}</th>
                        </tr>
                        <tbody>
                        @foreach($users as $user)
                     <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->webseit}}</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
         </div>
     </div>
   </div>

</div>
@endsection


