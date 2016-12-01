<div class="panel-body">

    @if ($model->exists)

        {!! Form::model($model, ['route' => ['products.update', $model->id]]) !!}
        {{ method_field('PATCH') }}
    @else
        {!! Form::model($model, ['action' => 'ProductsController@store']) !!}
    @endif

        <div class="form-group">
          {!! Form::label('product_name', 'product name') !!}
          {!! Form::text('product_name', $model->product_name ?? '', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('product_description', 'product description') !!}
          {!! Form::textarea('product_description', $model->product_description ?? '', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('product_price', 'product price') !!}
          {!! Form::number('product_price', $model->product_price ?? '', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
          {!! Form::label('in_stock', 'In Stock') !!}
          {!! Form::checkbox('in_stock', $model->in_stock ?? '', true) !!}
        </div>

        <button class="btn btn-success" type="submit">Add Product!</button>

    {!! Form::close() !!}
</div>