<?php

namespace App\Domain\Postlike\Http\Controllers;

use App\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use App\Domain\Postlike\Http\Requests\Postlike\PostlikeStoreFormRequest;
use App\Domain\Postlike\Http\Requests\Postlike\PostlikeUpdateFormRequest;
use App\Domain\Postlike\Repositories\Contracts\PostlikeRepository;
use Illuminate\Http\Request;
use MohamedReda\DDD\Traits\Responder;
use App\Domain\Postlike\Entities\Postlike;
use App\Domain\Postlike\Http\Resources\Postlike\PostlikeResourceCollection;
use App\Domain\Postlike\Http\Resources\Postlike\PostlikeResource;

class PostlikeController extends Controller
{
    use Responder;

    /**
     * @var PostlikeRepository
     */
    protected $postlikeRepository;

    /**
     * View Path
     *
     * @var string
     */
    protected $viewPath = 'postlike';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'postlikes';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'postlikes';

    public function __construct(PostlikeRepository $postlikeRepository)
    {
        $this->postlikeRepository = $postlikeRepository;
    }
    public function index(Request $request)
    {
    }
    public function create()
    {
    }
    public function store(PostlikeStoreFormRequest $request)
    {
        $like = $this->postlikeRepository->create([
            'user_id' => auth('user-api')->user()->id,
            'post_id' => $request->post_id,
        ]);
        $like->save();
        return response()->json(['Data' => $like]);
    }

    public function show(Postlike $postlike)
    {
    }

    public function edit(Postlike $postlike)
    {
    }

    public function update(PostlikeUpdateFormRequest $request, $postlike)
    {
    }
    public function destroy($id)
    {
        $postlike = $this->postlikeRepository->where('id', $id)->doesntExist();
        if ($postlike) {
            return response()->json(['message' => 'Data Is Not Exists !!']);
        } else {
            $this->postlikeRepository->where('id', $id)->delete();
            return response()->json(['message' => 'Data Is Delete !!']);
        }
    }
}
