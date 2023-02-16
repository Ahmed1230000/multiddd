<?php

namespace App\Domain\Superadmin\Http\Controllers;

use App\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use App\Domain\Superadmin\Http\Requests\Superadmin\SuperadminStoreFormRequest;
use App\Domain\Superadmin\Http\Requests\Superadmin\SuperadminUpdateFormRequest;
use App\Domain\Superadmin\Repositories\Contracts\SuperadminRepository;
use Illuminate\Http\Request;
use MohamedReda\DDD\Traits\Responder;
use App\Domain\Superadmin\Entities\Registersuperadmin;
use App\Domain\Superadmin\Entities\Superadmin;
use App\Domain\Superadmin\Http\Resources\Superadmin\SuperadminResourceCollection;
use App\Domain\Superadmin\Http\Resources\Superadmin\SuperadminResource;
use Illuminate\Support\Facades\Hash;

class RegistersuperadminController extends Controller
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
    protected $viewPath = 'registersuperadmin';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'registersuperadmins';

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

    public function create(SuperadminStoreFormRequest $request)
    {
        $superadmin = Superadmin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $superadmin->save();
        return response()->json(['Data' => $superadmin]);
    }

    public function store(SuperadminStoreFormRequest $request)
    {
        
    }
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
    public function update(SuperadminUpdateFormRequest $request, $registersuperadmin)
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
