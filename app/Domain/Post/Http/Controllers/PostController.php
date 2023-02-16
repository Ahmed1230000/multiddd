<?php

namespace App\Domain\Post\Http\Controllers;

use App\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use App\Domain\Post\Http\Requests\Post\PostStoreFormRequest;
use App\Domain\Post\Http\Requests\Post\PostUpdateFormRequest;
use App\Domain\Post\Repositories\Contracts\PostRepository;
use Illuminate\Http\Request;
use MohamedReda\DDD\Traits\Responder;
use App\Domain\Post\Entities\Post;
use App\Domain\Post\Http\Resources\Post\PostResourceCollection;
use App\Domain\Post\Http\Resources\Post\PostResource;
use Carbon\Carbon;

class PostController extends Controller
{
    use Responder;

    /**
     * @var PostRepository
     */
    protected $postRepository;

    /**
     * View Path
     *
     * @var string
     */
    protected $viewPath = 'post';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'posts';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'posts';


    /**
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    public function index(Request $request)
    {
        $post = $this->postRepository->where('user_id', auth('user-api')->user()->id)->get();
        return response()->json(['Data' => $post]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function store(PostStoreFormRequest $request)
    {
        $post = $this->postRepository->create([
            'post' => $request->post,
            'user_id' => auth('user-api')->user()->id,
        ]);
        $post->save();
        return response()->json(
            [
                'Data' =>
                $post,
            ]
        );
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
    }
    public function update(Request $request, $post)
    {
        $post = $this->postRepository->where('id', $post)->update([
            'post' => $request->post,
        ]);
        $post->save();
        return response()->json(['message' => 'Data Is Updata!!']);
    }
    public function destroy($id)
    {
        $this->postRepository->where('id',$id)->delete();
        return response()->json(['message'=>'Data Is Delete !!']); 
    }
}
