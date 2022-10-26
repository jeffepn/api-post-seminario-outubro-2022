<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        return CommentResource::collection(Comment::all());
    }

    public function store(StoreCommentRequest $request)
    {
        $comment = Comment::create($request->all());
        
        $resource = new CommentResource($comment);
        $resource->additional(['message' => "O comentário foi criado com sucesso."]);
        return $resource;
    }

    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->all());

        return response(['message' => "O comentário foi atualizado com sucesso."]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response(["message" => "O comentário foi excluído com sucesso."]);
    }
}
