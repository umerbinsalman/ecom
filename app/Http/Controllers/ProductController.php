<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $tags=Tag::all();
        $categories=Category::all();
        return view('productIndex')->withTags($tags)->withCategories($categories);
    }

    public function store(Request $request)
    {
        $rules=[
            'product_name'=>'required',
            'product_description'=>'required',
            'product_price'=>'required',
            'product_quantity'=>'required'
        ];
        $this->validate($request,$rules);
        $product=new Product();
        $product->product_name=$request->input('product_name');
        $product->product_description=$request->input('product_description');
        $product->product_price=$request->input('product_price');
        $product->product_quantity=$request->input('product_quantity');
        $product->save();
        if($request->has('tags'))
        {
            $tags=$request->input('tags');
            $tagArr=[];
            foreach ($tags as $tag)
            {
                array_push($tagArr,$tag);
            }
            $product->tags()->attach($tagArr);
        }
        if($request->has('categories'))
        {
            $categories=$request->input('categories');
            $categoryArr=[];
            foreach ($categories as $category)
            {
                array_push($categoryArr,$category);
            }
            $product->categories()->attach($categoryArr);
        }
        return redirect(route('product.list'));
    }

    public function editIndex($id)
    {
        $product=Product::findOrFail($id);
        $tags=Tag::all();
        $categories=Category::all();
        return view('productIndex')->withTags($tags)->withCategories($categories)->withProduct($product);
    }

    public function update(Request $request,$id)
    {
        $rules=[
            'product_name'=>'required',
            'product_description'=>'required',
            'product_price'=>'required',
            'product_quantity'=>'required'
        ];
        $this->validate($request,$rules);
        $product=Product::findOrFail($id);
        $product->product_name=$request->input('product_name');
        $product->product_description=$request->input('product_description');
        $product->product_price=$request->input('product_price');
        $product->product_quantity=$request->input('product_quantity');
        $product->save();
        $product->categories()->detach();
        $product->tags()->detach();
        if($request->has('tags'))
        {
            $tags=$request->input('tags');
            $tagArr=[];
            foreach ($tags as $tag)
            {
                array_push($tagArr,$tag);
            }
            $product->tags()->attach($tagArr);
        }
        if($request->has('categories'))
        {
            $categories=$request->input('categories');
            $categoryArr=[];
            foreach ($categories as $category)
            {
                array_push($categoryArr,$category);
            }
            $product->categories()->attach($categoryArr);
        }
        return redirect(route('product.list'));
    }

    public function list()
    {
        return view('productList');
    }

    public function data()
    {
        $product=Product::all();
        return \DataTables::of($product)
            ->addColumn('action',function($data){
                return '<a href="'.route('product.edit.index',$data->id).'" class="btn btn-primary btn-xs">Edit</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
