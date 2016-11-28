<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index', ['products' => Product::paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create', ['model' => new Product()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Product();

        $model->product_name = $request->product_name;
        $model->product_description = $request->product_description;
        $model->product_price = $request->product_price;
        $model->product_seller = auth()->id();

        if ($model->save())
            return redirect()->action('ProductsController@show', ['id' => $model->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Product::findOrFail($id);

        return view('products.show', ['model' => $model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Product::findOrFail($id);

        return view('products.edit', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Product::findOrFail($id);

        $model->product_name = $request->product_name;
        $model->product_description = $request->product_description;
        $model->product_price = $request->product_price;
        $model->product_seller = auth()->id();

        if ($model->save())
            return redirect()->action('ProductsController@show', ['id' => $model->id]);
        else
            return redirect()->action('ProductsController@edit', ['id' => $model->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Product::findOrFail($id);

        if ($model->delete() && $model->trashed() ) {

            return redirect()->action('ProductsController@index');
        }
        else
            throw new Exception('Could not delete product.', 1);
    }
}
