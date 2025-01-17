<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriesModel;
use App\Conponents\Recusives;
use App\Http\Requests\CategoryValidation;
use Illuminate\Support\Str;


class CategoriesController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    protected $category;
    function __construct(){
        $this->category = new CategoriesModel();
    }
    public function getCategory($parentid){
        $data = $this->category->all();
        $recusive = new Recusives($data);
        $htmlSelect = $recusive->categoryRecusive($parentid);
        return $htmlSelect;
    }

    public function index()
    {
        $list = $this->category->paginate();
        $htmlSelect = $this->getCategory($parentid = "");
        return view('dashboard.admin.categories.list',compact('list','htmlSelect'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = $this->category->all();
        $htmlSelect = $this->getCategory($parentid = "");
        return view('dashboard.admin.categories.add',compact('htmlSelect'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryValidation $request)
    {
        $this->category->create([
            'name'=> $request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>Str::slug($request->name)
         ]);
         return redirect()->route('list_categories');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $oneCategory = $this->category->find($id);
        $htmlSelect = $this->getCategory($oneCategory->parent_id);
        return view('dashboard.admin.categories.update',compact('oneCategory','htmlSelect'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryValidation $request)
    {
        $this->category->find($request->id)->update([
            'id'=>$request->id,
            'name'=> $request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>Str::slug($request->name)
         ]);
         return redirect()->route('list_categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->category->find($id)->delete();
                return response()->json([
                    'code' => 200,
                    "message" => "success"
                ], 200);
            } catch (\Exception $exception) {
                Log::error("message: " . $exception->getMessage());
                return response()->json([
                    'code' => 500,
                    "message" => "false"
                ], 500);
            }
        }
    }

