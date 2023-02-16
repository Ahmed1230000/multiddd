<?php

namespace App\Domain\Admin\Http\Controllers;

use App\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use App\Domain\Admin\Http\Requests\Admin\AdminStoreFormRequest;
use App\Domain\Admin\Http\Requests\Admin\AdminUpdateFormRequest;
use App\Domain\Admin\Repositories\Contracts\AdminRepository;
use Illuminate\Http\Request;
use MohamedReda\DDD\Traits\Responder;
use App\Domain\Admin\Entities\Admin;
use App\Domain\Admin\Http\Resources\Admin\AdminResourceCollection;
use App\Domain\Admin\Http\Resources\Admin\AdminResource;

class AdminController extends Controller
{
    use Responder;
    
    /**
     * @var AdminRepository
     */
    protected $adminRepository;

    /**
     * View Path
     *
     * @var string
     */
    protected $viewPath = 'admin';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'admins';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'admins';


    /**
     * @param AdminRepository $adminRepository
     */
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $index = $this->adminRepository->spatie()->all();

        $this->setData('title', __('main.show-all') . ' ' . __('main.admin'));

        $this->setData('alias', $this->domainAlias);
        
        $this->setData('data', $index);
        
        $this->addView("{$this->domainAlias}::{$this->viewPath}.index");

        $this->useCollection(AdminResourceCollection::class,'data');

        return $this->response();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminStoreFormRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $this->setData('title', __('main.show') . ' ' . __('main.admin') . ' : ' . $admin->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');
        
        $this->setData('show', $admin);
        
        $this->addView("{$this->domainAlias}::{$this->viewPath}.show");

        $this->useCollection(AdminResource::class,'show');

        return $this->response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $this->setData('title', __('main.edit') . ' ' . __('main.admin') . ' : ' . $admin->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');
        
        $this->setData('edit', $admin);
        
        $this->addView("{$this->domainAlias}::{$this->viewPath}.edit");

        $this->useCollection(AdminResource::class,'edit');

        return $this->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateFormRequest $request, $admin)
    {
        $update = $this->adminRepository->update($request->validated(), $admin);
        
        if($update){
            $this->redirectRoute("{$this->resourceRoute}.show",[$update->id]);
            $this->setData('data', $update);
            $this->useCollection(AdminResource::class, 'data');
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

        $delete = $this->adminRepository->destroy($ids);

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
