                             @csrf
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
            @if(active_languages() ->count() > 0)
                @foreach(active_languages() as $index => $lang)
                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput1">  {{trans('admin.maincategory_form_name')}} -  {{ trans('languages.' . $lang->abbreviation) }}  </label>
                                <input type="text" value="" id="name"
                                    class="form-control"
                                    placeholder="{{trans('admin.maincategory_form_enter_name')}} "
                                    name="category[{{$index}}][name]">
                                    @error("category.$index.name")
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-md-6 hidden">
                            <div class="form-group">
                                <label for="projectinput1">   {{trans('admin.lang_form_abbre')}} - {{trans('languages.' . $lang->abbreviation)}}</label>
                            <input type="text" value="{{$lang->abbreviation}}" id="name"
                                    class="form-control"
                                    placeholder="{{trans('admin.lang_form_enter_abbre')}}  "
                                    name="category[{{$index}}][abbreviation]">
                                
                                @error("category.$index.abbreviation")
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                </div>
        
                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group  mt-1" >
                                <input type="checkbox" name="category[{{$index}}][active]" value="1"
                                    id="switcheryColor4"
                                    class="switchery" data-color="success"
                                    @if($lang->active == 1) checked @endif
                                    />
                                <label for="switcheryColor4"
                                    class="card-title ml-1">  {{trans('admin.lang_status') }} - {{trans('languages.' . $lang->abbreviation)}} </label> <br>
                                @error("category.$index.active")
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                            
                            </div>
                        </div>
                </div>
                @endforeach
            @endif
        </div>

