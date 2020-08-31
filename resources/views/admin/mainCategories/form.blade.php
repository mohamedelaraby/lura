                             
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

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                                                            <label for="projectinput1"> {{trans('admin.maincategory_form_name')}} </label>
                                                            <input type="text" value="{{ old('name') ?? $mainCategory->name}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="{{trans('admin.maincategory_form_enter_name')}} "
                                                                   name="name">
                                                            <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                                         </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> {{trans('admin.lang_form_abbre')}}</label>
                                                            <input type="text" value="" id="name"
                                                                   class="form-control"
                                                                   placeholder="{{trans('admin.lang_form_enter_abbre')}}  "
                                                                   name="abbr">
                                                             <span class="text-danger"> </span>
                                                         </div>
                                                    </div>
                                                </div>
    
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group {{$errors->has('active') ? 'has-error' : ''}} mt-1" >
                                                            <input type="checkbox" name="active" value="1"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   @if($mainCategory->active == 1) checked @endif
                                                                   />
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">{{trans('admin.lang_status') }} </label> <br>
                                                            <span class="text-danger">{{$errors->has('active') ? $errors->first('active') : ''}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

