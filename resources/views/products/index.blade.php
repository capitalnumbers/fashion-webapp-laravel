@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Products Listing</div>

                <div class="panel-body">
                    @if(count($products) > 0)
                        <table>
                            <thead>
                                <tr>
                                    <th>Product Name </th><th>&nbsp</th>
                                    <th>product_price </th><th>&nbsp</th>
                                    <th>currency code </th><th>&nbsp</th>
                                    <th>In stock </th><th>&nbsp</th>
                                    <th>created at </th><th>&nbsp</th>
                                    <th>deleted at </th><th>&nbsp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->product_name }}</td><td>&nbsp</td>
                                        <td>{{ $product->product_price }}</td><td>&nbsp</td>
                                        <td>{{ $product->currency_code }}</td><td>&nbsp</td>
                                        <td>{{ $product->in_stock }}</td><td>&nbsp</td>
                                        <td>{{ $product->created_at }}</td><td>&nbsp</td>
                                        <td>{{ $product->deleted_at }}</td><td>&nbsp</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
