<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
//use App\Article;
use App\Models\Article;
use App\Models\Liste;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Frontend\Input;

class ArticleController extends Controller{

    public function index()
    {
        $articles = Article::all();
         var_dump($articles);
       //  return view('welcome');
       // return response()->json($articles);
     
    }

    public function getArticle($id)
    {
        $input = Article::find($id);

        return response()->json($input);
    }
    public function deleteArticle($id)
    {
        $article = Article::find($id);

        $article->delete();

        return response()->json([
            'test'=>'message'
        ]);
    }
   

    public function updateArticle(Request $request){

        $reqdata = $request->all(); 
 
       //  $reqdata['date_created'] = date('Y-m-d');
 
          $lesson= Article::where('id',$request->id)->update($reqdata);
 
         if ($lesson) {
 
             return 'true';
 
         }else{
 
             return 'false';
 
         }
 
     } 
    public function createArticle(Request $request)
    {
            $article = new Article();

            $article->title = $request->input('title');
            $article->content = $request->input('content');
            $article->image = $request->input('image');

            if($article->save()){
                return response()->json([
                    'status'=>200,
                    'message'=>'article created ! '
                ]);
            }
    }
}
