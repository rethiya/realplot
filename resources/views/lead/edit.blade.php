@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a lead</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('lead-update', $singleLead->id) }}">
            @csrf
            <div class="form-group">

                <label for="name">First & Last Name:</label>
                <input type="text" class="form-control" name="name" value={{ $singleLead->name }} />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $singleLead->email }} />
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="number" class="form-control" name="phone" value={{ $singleLead->phone }} />
            </div>
            <div class="form-group">
                <label for="country">Address:</label>
                <input type="text" class="form-control" name="address" value={{ $singleLead->address }} />
            </div>
            <div class="form-group">
                <label for="job_title">Home sqft:</label>
                <input type="text" class="form-control" name="sqft" value={{ $singleLead->sqft }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection