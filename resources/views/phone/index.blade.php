@extends('layouts.app-master')

@section('content')
    <form method="post" action="{{ route('phones.store') }}">
        @csrf
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required="required" autofocus>
            <label for="floatingName">Name</label>
        </div>
        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required="required" autofocus>
            <label for="floatingName">Email</label>
        </div>
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" required="required" autofocus>
            <label for="floatingName">Phone Number</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
    </form>
@endsection