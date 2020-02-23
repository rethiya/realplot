@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Lead Deatil View</h1>

        <form method="post" action="{{ route('lead-update', $singleLead->id) }}">
            @csrf
            <div class="form-group">

                <label for="name">First & Last Name:</label>
                <input type="text" class="form-control" name="name" readonly="readonly" value={{ $singleLead->name }} />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" readonly="readonly" value={{ $singleLead->email }} />
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="number" class="form-control" name="phone" readonly="readonly" value={{ $singleLead->phone }} />
            </div>
            <div class="form-group">
                <label for="country">Address:</label>
                <input type="text" class="form-control" name="address" readonly="readonly" value={{ $singleLead->address }} />
            </div>
            <div class="form-group">
                <label for="job_title">Home sqft:</label>
                <input type="text" class="form-control" name="sqft" readonly="readonly" value={{ $singleLead->sqft }} />
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-default">Back</a> 
        </form>
    </div>
</div>
@endsection