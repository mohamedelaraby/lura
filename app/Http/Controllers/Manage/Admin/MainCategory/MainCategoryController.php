<?php

namespace App\Http\Controllers\Manage\Admin\MainCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoryRequest;
use App\Models\MainCategory;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    /**
     *  Display main categories page
     *
     * @return Response
     */
    public function index(){
         // Get default language
         $defaultLanguage = default_language();
         // Get maincategory upon default language
        $mainCategories =  MainCategory::where('translation_lang',$defaultLanguage)
                                                        ->mainCategorySelection()
                                                        ->get();

        return view('admin.mainCategories.index',compact('mainCategories'));
    }

    /**
     *  Form for creating new main category
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $mainCategory = new MainCategory();
        return view('admin.mainCategories.create',compact('mainCategory'));
    }
    
    /**
     *  Store new main category
     * 
     * @param mixed| null App\Requests\MainCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainCategoryRequest $request){
        // Make  collect from request
        $mainCategory = collect($request->category);

        // Create filter to get data upon default lang
        $filter = $mainCategory->filter(function($value,$key){
            return $value['abbreviation'] == default_language();
        });

        // Upload image
        $photoPath = '';
        if($request->hasFile('photo')){
            $photoPath = uploadImage('maincategories',$request->photo);
        }

        // return default category collect as array 
        $defaultCategory =  array_values($filter->all())[0];

        // Store default category by id
        // $defaultCategoryId = MainCategory::insertGetId([
        //     'translation_lang' =>$defaultCategory['abbreviation'],
        //     'translation_of' =>0,
        //     'name' =>$defaultCategory['name'],
        //     'slug' =>$defaultCategory['name'],
        //     'photo' =>$photoPath,
        // ]);

        // Find non default language main categories
        return $filter =  $mainCategory->filter(function($value){
            return $value['abbreviation'] != default_language();
        });


    }
}
