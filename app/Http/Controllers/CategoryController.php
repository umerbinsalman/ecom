<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tag;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        $tag=\App\Tag::all()->pluck('tag_name','id');
        return view('categoryIndex')->withTag($tag);
    }

    public function store(Request $request)
    {
        $rules=[
            'category_name'=>'required',
            'category_tag_id'=>'required'
        ];
        $this->validate($request,$rules);
        $cat=new Category();
        $cat->category_name=$request->input('category_name');
        $cat->category_tag_id=$request->input('category_tag_id');
        $cat->category_user_id=\Auth::user()->id;
        $cat->save();
        return redirect(route('category.list'));
    }

    public function editIndex($id)
    {
        $category=Category::findOrFail($id);
        $response=\Illuminate\Support\Facades\Gate::inspect('update',$category);
        if($response->allowed())
        {
            $this->authorize('update',$category);
        }
        else
        {
            return $response->message();
        }
        $tag=\App\Tag::all()->pluck('tag_name','id');
        return view('categoryIndex')->withCategory($category)->withTag($tag);
    }

    public function update(Request $request,$id)
    {
        $rules=[
            'category_name'=>'required',
            'category_tag_id'=>'required'
        ];
        $this->validate($request,$rules);
        $category=Category::findOrFail($id);
        $response=\Illuminate\Support\Facades\Gate::inspect('update',$category);
        if($response->allowed())
        {
            $this->authorize('update',$category);
        }
        else
        {
            return $response->message();
        }
        $category->category_name=$request->input('category_name');
        $category->category_tag_id=$request->input('category_tag_id');
        $category->category_user_id=\Auth::user()->id;
        $category->save();
        return redirect(route('category.list'));
    }

    public function list()
    {
        return view('categoryList');
    }

    public function data()
    {
       $category=DB::table('categories')
            ->join('tags','tags.id','=','categories.category_tag_id')
            ->select('categories.*','tags.tag_name')
            ->get();
       return DataTables::of($category)
           ->addColumn('action',function($data){
               return '<a href="'.route('category.edit.index',$data->id).'" class="btn btn-primary btn-xs">Edit</a>';
           })
           ->rawColumns(['action'])
           ->make(true);
    }
}
