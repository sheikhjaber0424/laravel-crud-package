<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return Article::all();
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $article = Article::create($request->all());
        return response()->json($article, 201);
    }

    // Display the specified resource.
    public function show(Article $article)
    {
        return $article;
    }

    // Update the specified resource in storage.
    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return response()->json($article, 200);
    }

    // Remove the specified resource from storage.
    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json(null, 204);
    }
}
