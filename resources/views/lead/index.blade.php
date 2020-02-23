@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
                <h2>Add Leads</h2>
                    <form method="POST" action="/add-lead">
                        {{ csrf_field() }}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="name">First & Last Name :</label>
                            <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name">
                        </div>
                 
                        <div class="form-group">
                            <label for="email">Email Address :</label>
                            <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number :</label>
                            <input type="number" class="form-control" id="phone" value="{{ old('phone') }}" name="phone">
                        </div>
                 
                        <div class="form-group">
                            <label for="address">Address :</label>
                            <input type="text" class="form-control" id="address" value="{{ old('address') }}" name="address">
                        </div>

                        <div class="form-group">
                            <label for="sqft">Home Sqft :</label>
                            <input type="text" class="form-control" id="sqft" value="{{ old('sqft') }}" name="sqft">
                        </div>
                 
                        <div class="form-group">
                            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ url('list-lead') }}" class="btn btn-primary">List</a>
                        </div>
                       
                       
                    </form>

               
            
        </div>
    </div>
</div>
@endsection