@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Product details</div>

                    <div class="row">
                        <div class="col-md-3">
                            <p>Product Name</p>
                            <p>{{ $model->product_name }}</p>
                        </div>
                        <div class="col-md-3">
                            <p>product_price</p>
                            <p>{{ $model->product_price }}</p>
                        </div>
                        <div class="col-md-2">
                            <p>product_seller</p>
                            <p>{{ $model->product_seller }}</p>
                        </div>
                        <div class="col-md-3">
                            <p>created_at</p>
                            <p>{{ $model->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
