@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Product {{ $model->product_name}}</div>

                @include('products.form')
            </div>
        </div>
    </div>
</div>
@endsection
