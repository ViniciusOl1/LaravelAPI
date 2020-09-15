<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class ApiController extends Controller
{
    public function getAllNews(){
        $news = News::get()->toJson(JSON_PRETTY_PRINT);
        return response($news, 200);
    }
    public function createNew(Request $request){
        $new = new News;
        $new->title = $request->title;
        $new->content = $request->content;
        $new->source = $request->source;
        $new->image = $request->image;
        $new->save();

        return response()->json([
            "message" => "Notícia Criada"
        ], 201);
    }
    public function getNew($id){
        if(News::where('id', $id)->exists()){
            $new = News::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($new, 200);
        } else {
            return response()->json([
                "message" => "Notícia não encontrada"
            ], 404);
        }
    }
    public function updateNew(Request $request, $id){
        if(News::where('id', $id)->exists()){
            $new = News::find($id);
            $new->title = is_null($request->title) ? $new->title : $request->title;
            $new->content = is_null($request->content) ? $new->content : $request->content;
            $new->source = is_null($request->source) ? $new->source : $request->source;
            $new->image = is_null($request->image) ? $new->image : $request->image;
            $new->save();

            return response()->json([
                "message" => "Notícia atualizada com sucesso!"
            ], 200);
        } else {
            return response()->json([
                "message" => "Notícia não encontrada"
            ], 404)
        }
    }
    public function deleteNew($id){
        if(News::where('id', $id)->exists()){
            $new = News::find($id);
            $new->delete();
            return response()->json([
                "message" => "Notícia excluída"
            ], 202)
        } else {
            return response()->json([
                "message" => "Notícia não encontrada"
            ], 404)
        }
    }
}
