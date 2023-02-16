<?php

namespace App\Domain\Admin\Http\Controllers;

use App\Domain\Admin\Entities\Admin;
use App\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use App\Domain\Admin\Http\Requests\Admin\AdminStoreFormRequest;
use App\Domain\Admin\Http\Requests\Admin\AdminUpdateFormRequest;
use App\Domain\Admin\Repositories\Contracts\AdminRepository;
use Illuminate\Http\Request;
use MohamedReda\DDD\Traits\Responder;
use App\Domain\Admin\Entities\Adminlogin;
use App\Domain\Admin\Http\Resources\Admin\AdminResourceCollection;
use App\Domain\Admin\Http\Resources\Admin\AdminResource;
use Illuminate\Support\Facades\Hash;

class AdminregisterController extends Controller
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
    protected $viewPath = 'adminlogin';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'adminlogins';

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function store(AdminStoreFormRequest $request)
    {
        $admin  = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $admin->save();
        return response()->json(['Data' => $admin]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUpdateFormRequest $request, $adminlogin)
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
