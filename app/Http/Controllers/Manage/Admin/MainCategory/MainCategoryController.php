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
        return $request;
    }
}
