@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Leads</h1>    
  <table class="table table-striped">
    <thead> 
        <tr>
          <td>Name</td>
          <td>Email</td>
          <td>Date Added</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($leads as $lead)
        <tr>
            <td>{{$lead->name}}</td>
            <td>{{$lead->email}}</td>
            <td>{{$lead->created_at}}</td>
            <td>
                <a href="{{ route('lead-view',$lead->id)}}" class="btn btn-primary">View</a>
            </td>
            <td>
                <a href="{{ route('lead-edit',$lead->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                
                <form action="{{ route('lead-destroy', $lead->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure to delete?')">Delete</button>
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
  </table>
  <a href="{{ url('/add-lead') }}" class="btn btn-primary" style="float:right;margin-right: 177px;">Add data</a>
<div>
</div>
@endsection

