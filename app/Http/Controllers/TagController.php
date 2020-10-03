<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TagController extends Controller
{
    public function index()
    {
        return view('tagIndex');
    }

    public function store(Request $request)
    {
        $rule=['tag_name'=>'required'];
        $this->validate($request,$rule);
        $tag=new Tag();
        $tag->tag_name=$request->input('tag_name');
        $tag->save();
        return redirect(route('tag.list'));
    }

    public function list()
    {
        return view('tagList');
    }

    public function data()
    {
        $tag=Tag::all();
        return DataTables::of($tag)
            ->addColumn('action',function($data){
                return '<a href="'.route('tag.edit.index',$data->id).'" class="btn btn-primary btn-xs">Edit</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function editIndex($id)
    {
        $tag=Tag::findOrFail($id);
        return view('tagIndex')->withTag($tag);
    }

    public function update(Request $request,$id)
    {
        $rule=['tag_name'=>'required'];
        $this->validate($request,$rule);
        $tag=Tag::findOrFail($id);
        $tag->tag_name=$request->input('tag_name');
        $tag->save();
        return redirect(route('tag.list'));
    }
}
