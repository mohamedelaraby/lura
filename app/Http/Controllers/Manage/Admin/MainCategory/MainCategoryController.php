<?php

namespace App\Http\Controllers\Manage\Admin\MainCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoryRequest;
use App\Models\MainCategory;
use Illuminate\Support\Facades\DB;

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
            try{
            // Make  collect from request
            $mainCategory = collect($request->category);


            // Create filter to get data upon default lang
            $filter = $mainCategory->filter(function($value){
                return $value['abbreviation'] == default_language();
            });
        
            // return default category collect as array 
            $defaultCategory =  array_values($filter->all())[0];

            // Upload image
            $photoPath = '';
            if($request->hasFile('photo')){
                $photoPath = uploadImage('maincategories',$request->photo);
            }

            /** Start data base transaction */
            DB::beginTransaction();

            // Store default category by id
            $defaultCategoryId = MainCategory::insertGetId([
                'translation_lang' =>$defaultCategory['abbreviation'],
                'translation_of' =>0,
                'name' =>$defaultCategory['name'],
                'slug' =>$defaultCategory['name'],
                'photo' =>$photoPath,
            ]);

            // Find non default language main categories
            $categories =  $mainCategory->filter(function($value){
                return $value['abbreviation'] != default_language();
            });

            

            // Check if there any non default categories
            if(isset($categories) && $categories ->count()){
                $category_arr = []; // Store any other non default catgories
                // Store categroies into categories array
                foreach($categories as $category){
                    $category_arr [] = [ 
                        'translation_lang' =>$category['abbreviation'],
                        'translation_of' =>$defaultCategoryId,
                        'name' =>$category['name'],
                        'slug' =>$category['name'],
                        'photo' =>$photoPath,
                    ];
                }

                // Insert into database
                MainCategory::insert($category_arr);
                // Complete database operations
            }
            DB::commit();

            // Display masseges
            show_message('msg',trans('auth.add'));

            return redirect()->route('admin.maincategory');
            
        } catch(\Exception $exception){
            
            // Do not do any database operations
            DB::rollBack();
            show_message('error',trans('auth.failed'));
            return redirect()->route('admin.maincategory');
        }

    }


      /**
     *  Display update element view
     *
     *  @param  mixed $id
     * @return Response
     */
    public function edit($id){
        $mainCategory = MainCategory::select()->find($id);
        if(!$mainCategory){
            show_message('error',trans('auth.not_found'));
            return redirect()->route('admin.maincategory');
        }

        return view('admin.maincategories.edit',compact('mainCategory'));
    }

    /**
     *  Update existing language
     *
     *  @param  Response $request
     *  @param  mixed $id
     */
    public function update(MainCategoryRequest $request,$id){
        try{
            $maincategory = MainCategory::find($id);
            if(!$maincategory){
                show_message('error',trans('auth.failed'));
                return redirect()->route('admin.maincategory.edit',$id);
            }

        
        //Update maincategory
        $maincategory->update($request->except("_token"));
        show_message('msg',trans('auth.update'));
        return redirect()->route('admin.maincategory');

        } catch (\Exception $exception){
                show_message('error',trans('auth.add'));
                return redirect()->route('admin.maincategory');
        }
    }

    /**
     *  Delete existing language
     *
     *  @param  Response $request
     *  @param  mixed $id
     */
    // public function delete($id){
    //     try{
    //         $language = Language::find($id);
    //         if(!$language){
    //             show_message('error',trans('auth.failed'));
    //             return redirect()->route('admin.languages');
    //         }

    //     //Update language
    //     $language->delete();
    //     show_message('msg',trans('auth.delete'));
    //     return redirect()->route('admin.languages');

    //     } catch (\Exception $exception){
    //             show_message('error',trans('auth.failed'));
    //             return redirect()->route('admin.languages');
    //     }
    // }

    /**
     *  Handle exceptions 
     *  
     * @return response
     */
    protected function handleErrors(){
        try{
            // Start database operations
            DB::beginTransaction();
            
                # Code here
            // Commit to database
            DB::commit();
        } catch (\Exception $exception){
            // Don`t insert into database
            DB::rollBack();
        }
    }
}
