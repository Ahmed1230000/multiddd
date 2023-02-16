<?php

namespace App\Domain\Superadmin\Http\Controllers;

use App\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use App\Domain\Superadmin\Http\Requests\Superadmin\SuperadminStoreFormRequest;
use App\Domain\Superadmin\Http\Requests\Superadmin\SuperadminUpdateFormRequest;
use App\Domain\Superadmin\Repositories\Contracts\SuperadminRepository;
use Illuminate\Http\Request;
use MohamedReda\DDD\Traits\Responder;
use App\Domain\Superadmin\Entities\Superadmin;
use App\Domain\Superadmin\Http\Resources\Superadmin\SuperadminResourceCollection;
use App\Domain\Superadmin\Http\Resources\Superadmin\SuperadminResource;

class SuperadminController extends Controller
{
    use Responder;
    
    /**
     * @var SuperadminRepository
     */
    protected $superadminRepository;

    /**
     * View Path
     *
     * @var string
     */
    protected $viewPath = 'superadmin';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'superadmins';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'superadmins';


    /**
     * @param SuperadminRepository $superadminRepository
     */
    public function __construct(SuperadminRepository $superadminRepository)
    {
        $this->superadminRepository = $superadminRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $index = $this->superadminRepository->spatie()->all();

        $this->setData('title', __('main.show-all') . ' ' . __('main.superadmin'));

        $this->setData('alias', $this->domainAlias);
        
        $this->setData('data', $index);
        
        $this->addView("{$this->domainAlias}::{$this->viewPath}.index");

        $this->useCollection(SuperadminResourceCollection::class,'data');

        return $this->response();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setData('title', __('main.add') . ' ' . __('main.superadmin'), 'web');

        $this->setData('alias', $this->domainAlias,'web');
        
        $this->addView("{$this->domainAlias}::{$this->viewPath}.create");

        $this->setApiResponse(fn()=> response()->json(['create_your_own_form'=>true]));

        return $this->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuperadminStoreFormRequest $request)
    {
        $store = $this->superadminRepository->create($request->validated());

        if($store){
            $this->setData('data', $store);
            
            $this->redirectRoute("{$this->resourceRoute}.show",[$store->id]);
            $this->useCollection(SuperadminResource::class, 'data');
        }else{
            $this->redirectBack();
            $this->setApiResponse(fn()=> response()->json(['created'=>false]));
        }

        return $this->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Superadmin $superadmin)
    {
        $this->setData('title', __('main.show') . ' ' . __('main.superadmin') . ' : ' . $superadmin->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');
        
        $this->setData('show', $superadmin);
        
        $this->addView("{$this->domainAlias}::{$this->viewPath}.show");

        $this->useCollection(SuperadminResource::class,'show');

        return $this->response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Superadmin $superadmin)
    {
        $this->setData('title', __('main.edit') . ' ' . __('main.superadmin') . ' : ' . $superadmin->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');
        
        $this->setData('edit', $superadmin);
        
        $this->addView("{$this->domainAlias}::{$this->viewPath}.edit");

        $this->useCollection(SuperadminResource::class,'edit');

        return $this->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuperadminUpdateFormRequest $request, $superadmin)
    {
        $update = $this->superadminRepository->update($request->validated(), $superadmin);
        
        if($update){
            $this->redirectRoute("{$this->resourceRoute}.show",[$update->id]);
            $this->setData('data', $update);
            $this->useCollection(SuperadminResource::class, 'data');
        }else{
            $this->redirectBack();
            $this->setApiResponse(fn()=>response()->json(['updated'=>false],422));
        }

        return $this->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids = request()->get('ids',[$id]);

        $delete = $this->superadminRepository->destroy($ids);

        if($delete){
            $this->redirectRoute("{$this->resourceRoute}.index");
            $this->setApiResponse(fn()=>response()->json(['deleted'=>true],200));
        }else{
            $this->redirectBack();
            $this->setApiResponse(fn()=>response()->json(['updated'=>false],422));
        }

        return $this->response();
    }

}
