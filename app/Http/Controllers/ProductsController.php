<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\ProductRepository as Product;

class ProductsController extends Controller
{
    private $product;

    public function __construct(Product $product){
        $this->middleware('auth');

        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('products.index', ['products' => $this->product->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('products.create', ['model' => $this->product->createNewInstance()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        if ($model = $this->product->create([
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_price' => $request->product_price,
                'product_seller' => auth()->id(),
                'in_stock' => $request->in_stock
            ])
        )
            return redirect()->action('ProductsController@show', ['id' => $model->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $model = $this->product->findOrFail($id);

        return view('products.show', ['model' => $model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $model = $this->product->findOrFail($id);

        return view('products.edit', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $model = $this->product->findOrFail($id);

        if ($this->product->update([
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_price' => $request->product_price,
                'product_seller' => auth()->id(),
                'in_stock' => $request->in_stock
                ],$model->id
            )
        )
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
    public function destroy($id){

        $model = $this->product->findOrFail($id);

        if ($this->product->delete($model->id))
            return redirect()->action('ProductsController@index');
        else
            throw new Exception('Could not delete product.', 1);
    }
}
