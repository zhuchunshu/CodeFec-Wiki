<?php

namespace App\Plugins\Wiki\src\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plugins\Wiki\src\Models\Wiki;
use App\Plugins\Wiki\src\Models\WikiClass;

class WikiClassController extends Controller
{
    public function class($ename,WikiClass $wikiClass,Wiki $wiki){
        if(!$wikiClass->where(['ename' => $ename,'status' => '正常'])->count()){
            return abort(404);
        }
        $class = $wikiClass->where(['ename' => $ename,'status' => '正常'])->first();
        if(!$wiki->where('class_id',$class->id)->select('title','id')->count()){
            return abort(403,'此分类下无内容');
        }
        $data =  $wiki
        ->where('class_id',$class->id)
        ->select('title','id','user_id')
        ->with('user')
        ->orderBy('created_at','asc')
        ->get();
        $content = $wiki
        ->where('class_id',$class->id)
        ->with('user')
        ->first();
        $shang = $wiki->where([['id','<',$content->id],['class_id',$class->id]])->select('title','id','class_id')->with('class')->orderBy('id','desc')->first();
        $xia = $wiki->where([['id','>',$content->id],['class_id',$class->id]])->select('title','id','class_id')->with('class')->orderBy('id','asc')->first();
        return view("Wiki::web.show",compact('data','class','content','shang','xia'));
    }
    public function show($ename,$id,WikiClass $wikiClass,Wiki $wiki){
        if(!$wikiClass->where(['ename' => $ename,'status' => '正常'])->count()){
            return abort(404);
        }
        $class = $wikiClass->where(['ename' => $ename,'status' => '正常'])->first();
        if(!$wiki->where('class_id',$class->id)->select('title','id')->count()){
            return abort(403,'此分类下无内容');
        }
        $data =  $wiki
        ->where('class_id',$class->id)
        ->select('title','id','user_id')
        ->with('user')
        ->orderBy('created_at','asc')
        ->get();
        $content = $wiki
        ->where(['id' => $id])
        ->with('user')
        ->first();
        if(!$content){
            return abort(404);
        }
        $shang = $wiki->where([['id','<',$content->id],['class_id',$class->id]])->select('title','id','class_id')->with('class')->orderBy('id','desc')->first();
        $xia = $wiki->where([['id','>',$content->id],['class_id',$class->id]])->select('title','id','class_id')->with('class')->orderBy('id','asc')->first();
        return view("Wiki::web.show",compact('data','class','content','shang','xia'));
    }
}
