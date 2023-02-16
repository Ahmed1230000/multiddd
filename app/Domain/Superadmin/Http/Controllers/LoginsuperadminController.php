<?php

namespace App\Domain\Superadmin\Http\Controllers;

use App\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use App\Domain\Superadmin\Http\Requests\Superadmin\SuperadminStoreFormRequest;
use App\Domain\Superadmin\Http\Requests\Superadmin\SuperadminUpdateFormRequest;
use App\Domain\Superadmin\Repositories\Contracts\SuperadminRepository;
use Illuminate\Http\Request;
use MohamedReda\DDD\Traits\Responder;
use App\Domain\Superadmin\Entities\Loginsuperadmin;
use App\Domain\Superadmin\Http\Resources\Superadmin\SuperadminResourceCollection;
use App\Domain\Superadmin\Http\Resources\Superadmin\SuperadminResource;
use Illuminate\Support\Facades\Auth;

class LoginsuperadminController extends Controller
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
    protected $viewPath = 'loginsuperadmin';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'loginsuperadmins';

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function store(Request $request)
    {
        $superadmin = request(['email', 'password']);
        if (!Auth::guard('superadmin')->attempt($superadmin)) {
            return response()->json(['message' => 'please Register And Tray Again !!']);
        }
        $usercatch = Auth::guard('superadmin')->user();
        $accessToken = $usercatch;
        $accessToken['token'] = $usercatch->createToken('super admin token')->accessToken;
        return response()->json(
            [
                'Data' =>
                [
                    'user' => Auth::guard('superadmin')->user(),
                    'accesstoken' => $accessToken->accessToken,
                    'token' => 'Bearer',
                ]
            ]
        );
    }
    public function show(Request $requeste)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $requeste)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuperadminUpdateFormRequest $request, $loginsuperadmin)
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
