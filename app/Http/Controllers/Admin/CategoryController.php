<?php

namespace App\Http\Controllers\Admin;


use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories=Category::where('parent_id' , 0)->get();
        $attribute=Attribute::all();
        return view('admin.categories.create' , compact('parentCategories' , 'attribute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories,slug',
            'parent_id'=>'required',
            'attribute_ids'=>'required',
            'attribute_is_filter_ids'=>'required',
            'variation'=>'required',
        ]);

        try {


            DB::beginTransaction();
            $category=Category::create([
                'name'=>$request->name,
                'slug'=>$request->slug,
                'parent_id'=>$request->parent_id,
                'icon'=>$request->icon,
                'description'=>$request->desscription,

            ]);
             foreach ($request->attribute_ids as $attributeId) {

                $attribute=Attribute::findOrFail($attributeId);
                $attribute->categories()->attach($category->id , [

                    'is_filter'=>in_array($attributeId , $request->attribute_is_filter_ids) ? 1 : 0,
                    'is_variation'=> $request->variation==$attributeId ? 1 : 0 ,

                ]);
             }
             DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
