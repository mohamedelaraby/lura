<?php

use App\Models\City;
use App\Models\Country;
use App\Models\Settings;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;


/***** [  Start Global queries ] */


/**
 *  Count Languages numbers
 *  @return Integer
 */
    if (!function_exists('languages_count')) {
        function languages_count()
        {
            return App\Models\Language::count();
        }
    }

/**
 *  Find all active languages
 *  @return void
 */
    if (!function_exists('active_languages')) {
        function active_languages()
        {
            return App\Models\Language::active()->LanguageSelect()->get();
        }
    }


/**
 *  Get Main Category number
 *  @return Integer
 */
    if (!function_exists('main_category_count')) {
        function main_category_count()
        {
            return App\Models\MainCategory::count();
        }
    }
/***** [  End Global queries ] */



 /**
 *  Get App locale lang
 *  @return session
 */
if (!function_exists('locale')) {
    function locale()
    {
        if(session()->has('locale')){
            return session('locale');
        } else {
            return  session()->put('locale', 'ar');
        }

    }
}

/**
 *  Get default langugae
 *  @return void
 */
if (!function_exists('default_language')) {
    function default_language()
    {
       return Config::get('app.locale');

    }
}


 //[[[[[[[   UI Helper Functions  ]]]]]]]
/**
 *  Handle adminLTE design url prefix
 *  @var string |null $url
 *  @return URL
 */
if (!function_exists('admin_ui')) {
    function admin_ui($url = null)
    {
        return url('/design/admin/' . $url);
    }
}

/**
 *  Handle UI design url prefix
 *  @var string |null $url
 *  @return URL
 */
if (!function_exists('ui_url')) {
    function ui_url($url = null)
    {
        return url('/design/front/' . $url);
    }
}

/**
 *  Handle sidebar menu display
 *  @var string |null $url
 *  @return URL
 */
if (!function_exists('active_menu')) {
   function active_menu($link){
       if(preg_match('/'.$link.'/i', Request::segment(2))){
           return ['open','display:block'];
       } else {
           return ['',''];
       }

   }
}

/**
 *  Handle sidebar menu arrows icon
 *
 *  @return string
 */
if (!function_exists('arrow_icon')) {
   function arrow_icon(){
    if(app()->getlocale() == 'ar'){
      return  'right fas fa-angle-left';
    }else{
        return "right fas fa-angle-right";
    }

   }
}

/**
 *  Handle navbar direction
 *
 *  @return string
 */
if (!function_exists('nav_direction')) {
   function nav_direction(){
    if(app()->getlocale() == 'ar'){
      return  'mr-auto';
    }else{
        return "ml-auto";
    }

   }
}

 //[[[[[[[   UI Helper Functions  ]]]]]]]



/**
 *  Handle admin Auth guard prefix
 *
 *  @return guard
 */
if (!function_exists('adminAuthGuard')) {
    function adminAuthGuard()
    {
        return auth()->guard('admin');
    }
}

/**
 *  Handle admin Datatable data
 *
 *  @return array | mix
 */
if (!function_exists('datatable_lang')) {
    function datatable_lang()
    {
        return[
        "sProcessing" => trans('admin.sProcessing'),
        "sLengthMenu" => trans('admin.sLengthMenu'),
        "sZeroRecords" => trans('admin.sZeroRecords'),
        "sEmptyTable" => trans('admin.sEmptyTable'),
                "sInfo" => trans('admin.sInfo'),
            "sInfoEmpty" => trans('admin.sInfoEmpty'),
        "sInfoFiltered" => trans('admin.sInfoFiltered'),
        "sInfoPostFix" => trans('admin.sInfoPostFix'),
            "sSearch" => trans('admin.sSearch'),
                "sUrl" => trans('admin.sUrl'),
        "sInfoThousands" => trans('admin.sInfoThousands'),
    "sLoadingRecords" => trans('admin.sLoadingRecords'),
            "oPaginate" => [
                "sFirst" => trans('admin.sFirst'),
                "sLast" => trans('admin.sLast'),
                "sNext" => trans('admin.sNext'),
            "sPrevious" => trans('admin.sPrevious')
            ],
            "oAria" =>[
            "sSortAscending" => trans('admin.sSortAscending'),
            "sSortDescending" => trans('admin.sSortDescending')
            ]
            ];
    }
}





//[[[[[[[[ Validate Helper Functions]]]]]]]]

/**
 *  Validate incoming Images Requests
 *  @param mixed|null $extension
 *  @return Response
 */
if(!function_exists('validate_image')){
    function validate_image($extension=null){
        // If  no extension Then match image extension
        if($extension === null){
            return  'image|required|mimes:jpeg,png,jpg,gif,svg,bmp|max:2048';
        } else {
            // Use Image extension
            return 'image|required|mimes:'.$extension;
        }
    }


    //[[[[[[[[ Validate Helper Functions]]]]]]]]

}
/**
 *  Show session messages
 *
 *  @param mixed $msg_type
 *  @param mixed $msg
 *  @return string
 */
if(!function_exists('show_message')){
    function show_message($msg_type,$msg){
     return  session()->flash($msg_type,$msg);
    }
}



?>
