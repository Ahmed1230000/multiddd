<?php

namespace App\Domain\Product\Http\Controllers;

use App\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use App\Domain\Product\Http\Requests\Product\ProductStoreFormRequest;
use App\Domain\Product\Http\Requests\Product\ProductUpdateFormRequest;
use App\Domain\Product\Repositories\Contracts\ProductRepository;
use Illuminate\Http\Request;
use MohamedReda\DDD\Traits\Responder;
use App\Domain\Product\Entities\Product;
use App\Domain\Product\Http\Resources\Product\ProductResourceCollection;
use App\Domain\Product\Http\Resources\Product\ProductResource;

class ProductController extends Controller
{
    use Responder;

    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * View Path
     *
     * @var string
     */
    protected $viewPath = 'product';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'products';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'products';


    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->middleware('adminonly');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function store(ProductStoreFormRequest $request)
    {
        $product = $this->productRepository->create([
            'product_name' => $request->product_name,
            'admin_id' => auth('admin-api')->user()->id,
        ]);
        $product->save();
        return response()->json(['Data' => $product]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateFormRequest $request, $product)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
