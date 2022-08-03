<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller{

    public function __construct()
    {
        // module model name, path
        $this->module_model = "App\Models\Article";

        
    }
    public function index()
    {
        $articles = Article::all();
         //var_dump($articles);
       // return view('welcome');
       // return response()->json($articles);
       return view('frontend.list', compact('articles'));
    }
}