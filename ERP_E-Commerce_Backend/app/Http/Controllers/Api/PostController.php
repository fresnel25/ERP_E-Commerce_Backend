<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function ReadPost(Post $post)
  {
    try {
      return response()->json([
        'status_code' => 200,
        'status_message' => 'One Post',
        'data' => $post
      ]);
    } catch (Exception $e) {
      return response()->json($e);
    }
  }

  public function ReadAllPost(Request $request)
  {
    try {
      return response()->json([
        'status_code' => 200,
        'status_message' => 'All post',
        'data' => Post::all()
      ]);
    } catch (Exception $e) {
      return response()->json($e);
    }
  }

  public function CreatePost(CreatePostRequest $request)
  {
    try {
      $post = new Post();

      $post->Title = $request->Title;
      $post->Description = $request->Description;
      $post->Price = $request->Price;
      $post->Profil = $request->Profil;
      $post->QuantityInit = $request->QuantityInit;
      $post->QuantityStock = $request->QuantityStock;
      $post->TotalQuantityStock = $request->TotalQuantityStock;
      $post->category_id = $request->category_id;
      $post->user_id = auth()->user()->id;
      

      $post->save();

      return response()->json([
        'status_code' => 200,
        'status_message' => 'L\'article a ete ajoute',
        'data' => $post
      ]);
    } catch (Exception $e) {
      return response()->json($e);
    }
  }

  public function UpdatePost(UpdatePostRequest $request, Post $post)
  {

    try {

      $post->Title = $request->Title;
      $post->Description = $request->Description;
      $post->Price = $request->Price;
      $post->Profil = $request->Profil;
      $post->QuantityInit = $request->QuantityInit;
      $post->QuantityStock = $request->QuantityStock;
      $post->TotalQuantityStock = $request->TotalQuantityStock;

      $post->save();

      return response()->json([
        'status_code' => 200,
        'status_message' => 'L\'article a ete mis a jour',
        'data' => $post
      ]);
    } catch (Exception $e) {
      return response()->json($e);
    }
  }

  public function DeletePost(Post $post)
  {
    try {
      $post->delete();
      return response()->json([
        'status_code' => 200,
        'status_message' => 'L\'article a ete supprime avec succes',
        'data' => $post
      ]);
    } catch (Exception $e) {
      return response()->json($e);
    }
  }

}
