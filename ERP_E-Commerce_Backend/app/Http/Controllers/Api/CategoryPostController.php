<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryPost\CreateCategoryPostRequest;
use App\Http\Requests\CategoryPost\UpdateCategoryPostRequest;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;

class CategoryPostController extends Controller
{
    public function ReadCategory(Category $categoryPost)
    {

        try {
            return response()->json([
                'status_code' => 200,
                'message' => ' Category',
                'data' => $categoryPost,
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function ReadAllCategory()
    {

        try {
            return response()->json([
                'status_code' => 200,
                'message' => 'All Category',
                'data' => Category::all()
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function CreateCategory(CreateCategoryPostRequest $request)
    {

        try {

            $categoryPost = new Category();

            $categoryPost->Name = $request->Name;
            $categoryPost->Description = $request->Description;

            $categoryPost->save();

            return response()->json([
                'status_code' => 200,
                'message' => 'categorie enregistre ',
                'data' => $categoryPost
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function UpdateCategory(UpdateCategoryPostRequest $request, Category $categoryPost)
    {

        try {

            $categoryPost = new Category();

            $categoryPost->Name = $request->Name;
            $categoryPost->Description = $request->Description;

            $categoryPost->save();

            return response()->json([
                'status_code' => 200,
                'message' => 'categorie mis a jour ',
                'data' => $categoryPost
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function DeleteCategory(Category $categoryPost)
    {

        try {

            $categoryPost->delete();

            return response()->json([
                'status_code' => '200',
                'message' => 'categorie supprime qvec succes ',
                'data' => $categoryPost
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function getPostsByCategoryId( $categoryPost)
    {
        try {
            $posts = Post::where('category_id', $categoryPost)->get();

            return response()->json([
                'status_code' => 200,
                'message' => 'Posts by Category ID',
                'data' => [
                    'categoryPost'=>$categoryPost,
                    'post'=>$posts
                ],
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }
}
