        @csrf
        
        <div class="form-group">
            <div class="text-center">
            <img src="{{$mainCategory->photo}}" alt="{{trans('admin.main_categories_photo')}}" class="rounded-circel height-150">
            </div>
        </div>

        <div class="form-group {{$errors->has('photo') ? 'has-error' : ''}}">
            <label> {{trans('admin.maincategory_form_img')}} </label>
            <label id="projectinput7" class="file center-block">
                <input type="file" id="logo" name="photo">
                <span class="file-custom"></span>
            </label>
            <span class="text-danger">{{$errors->has('photo') ? $errors->first('photo') : ''}}</span>
            <div id="logo-output" class="mb-3"></div>
         </div>


        <div class="form-body">
            <h4 class="form-section"><i class="ft-home"></i>  {{trans('admin.maincategory_data')}} </h4>
            
            {{-- Display form inputs upon active  languages --}}
    
                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">  {{trans('admin.maincategory_form_name')}} -  {{ trans('languages.' . $mainCategory->translation_lang) }}  </label>
                            <input type="text" value="{{$mainCategory->name}}" id="name"
                                    class="form-control"
                                    placeholder="{{trans('admin.maincategory_form_enter_name')}} "
                                    name="category[][name]">
                                    @error("category.0.name")
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-md-6 hidden">
                            <div class="form-group">
                                <label for="projectinput1">   {{trans('admin.lang_form_abbre')}} - {{trans('languages.' . $mainCategory->translation_lang)}}</label>
                            <input type="text" value="{{$mainCategory->translation_lang}}" id="name"
                                    class="form-control"
                                    placeholder="{{trans('admin.lang_form_enter_abbre')}}  "
                                    name="category[][abbreviation]">
                                
                                @error("category.0.abbreviation")
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                </div>
        
                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group  mt-1" >
                                <input type="checkbox" name="category[][active]" value="1"
                                    id="switcheryColor4"
                                    class="switchery" data-color="success"
                                    @if($mainCategory->active == 1) checked @endif
                                    />
                                <label for="switcheryColor4"
                                    class="card-title ml-1">  {{trans('admin.lang_status') }} - {{trans('languages.' . $mainCategory->translation_lang)}} </label> <br>
                                @error("category.0.active")
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                            
                            </div>
                        </div>
                </div>
         
        </div>

