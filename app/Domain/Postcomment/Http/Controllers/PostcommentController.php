<?php

namespace App\Domain\Postcomment\Http\Controllers;

use App\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use App\Domain\Postcomment\Http\Requests\Postcomment\PostcommentStoreFormRequest;
use App\Domain\Postcomment\Http\Requests\Postcomment\PostcommentUpdateFormRequest;
use App\Domain\Postcomment\Repositories\Contracts\PostcommentRepository;
use Illuminate\Http\Request;
use MohamedReda\DDD\Traits\Responder;
use App\Domain\Postcomment\Entities\Postcomment;
use App\Domain\Postcomment\Http\Resources\Postcomment\PostcommentResourceCollection;
use App\Domain\Postcomment\Http\Resources\Postcomment\PostcommentResource;

class PostcommentController extends Controller
{
    use Responder;

    /**
     * @var PostcommentRepository
     */
    protected $postcommentRepository;

    /**
     * View Path
     *
     * @var string
     */
    protected $viewPath = 'postcomment';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'postcomments';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'postcomments';


    /**
     * @param PostcommentRepository $postcommentRepository
     */
    public function __construct(PostcommentRepository $postcommentRepository)
    {
        $this->postcommentRepository = $postcommentRepository;
    }
    public function index(Request $request)
    {
        $comment = $this->postcommentRepository->where('user_id', auth('user-api')->user()->id)->get();
        return response()->json(['Data' => $comment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function store(PostcommentStoreFormRequest $request)
    {
        $comment = $this->postcommentRepository->create([
            'comment' => $request->comment,
            'user_id' => auth('user-api')->user()->id,
            'post_id' => $request->post_id,
        ]);
        $comment->save();
        return response()->json(['Data' => $comment]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Postcomment $postcomment)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Postcomment $postcomment)
    {
    }
    public function update(Request $request, $postcomment)
    {
        $comment = $this->postcommentRepository->where('id', $postcomment)->update([
            'comment' => $request->comment,
        ]);
        $comment->save();
        return response()->json(['Data' => $comment]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->postcommentRepository->where('id', $id)->delete();
        return response()->json(['message' => 'Data Is Delete !!']);
    }
}
