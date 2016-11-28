@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Account</div>

                <div class="panel-body">

                    <form method="post" action="/settings/account">

                        {{ csrf_field() }}

                        {{ method_field('PATCH') }}

                        <div class="form-group">

                           <label for="name">Name:</label>

                           <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $user->name }}">
                        </div>

                        <div class="form-group">

                           <label for="email">Email:</label>

                           <input type="text" name="email" id="email" class="form-control" value="{{ old('email') ?? $user->email }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
