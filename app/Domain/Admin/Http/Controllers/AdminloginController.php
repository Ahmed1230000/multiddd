<?php

namespace App\Domain\Admin\Http\Controllers;

use App\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use App\Domain\Admin\Http\Requests\Admin\AdminStoreFormRequest;
use App\Domain\Admin\Http\Requests\Admin\AdminUpdateFormRequest;
use App\Domain\Admin\Repositories\Contracts\AdminRepository;
use Illuminate\Http\Request;
use MohamedReda\DDD\Traits\Responder;
use App\Domain\Admin\Entities\Adminlogin;
use App\Domain\Admin\Http\Resources\Admin\AdminResourceCollection;
use App\Domain\Admin\Http\Resources\Admin\AdminResource;
use Illuminate\Support\Facades\Auth;

class AdminloginController extends Controller
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

    public function create(AdminStoreFormRequest $Request)
    {
    }
    public function store(Request $request)
    {
        $admin = request(['email', 'password']);
        if (!Auth::guard('admin')->attempt($admin)) {
            return response()->json(['message' => "Stope!! Register And Tray Again !!"], 404);
        }
        $userCatch = Auth::guard('admin')->user();
        $accessToken = $userCatch;
        $accessToken['token'] = $userCatch->createToken('admin')->accessToken;
        return response()->json(
            [
                'Data' => 
                [
                    'user' => Auth::guard('admin')->user(),
                    'accesstoken' => $accessToken->accessToken,
                    'Token' => 'Bearer',
                ]
            ]
        );
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
