<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')
            ->only(['store', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResource::collection(Post::all());
    }

    public function list()
    {        
     
        return view(
            'post.index', 
            [
                'testVariable' => "Estou testando o <span class='text-danger'>front</span>",
                'posts' => Post::paginate(10)
            ]
        );
    }

    public function create()
    {        
        return view('post.create');
    }

    public function register(StorePostRequest $request)
    {
        Post::create($request->all());
       
        return redirect()->back()->with('success', "O post foi criado com sucesso.");
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->all());

        $resource = new PostResource($post);
        $resource->additional(['message' => "O Post foi criado com sucesso."]);
        return $resource;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());

        return response(['message' => "O Post foi atualizado com sucesso."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response(['message' => "O Post foi deletado com sucesso."]);
    }

    public function comments(Post $post)
    {
        return CommentResource::collection($post->comments);
    }
}
