<h4 class="form-section"><i class="ft-home"></i> {{ trans('admin.lang_data') }} </h4>
{{ csrf_field() }}
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}" >
            <label for="projectinput1"> {{ trans('admin.lang_form_name') }} </label>
            <input type="text" value="{{ old('name') ?? $language->name }}" id="name"
                   class="form-control"
                   placeholder=" {{ trans('admin.lang_form_enter_name') }}"
                   name="name">
                   <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group {{$errors->has('abbreviation') ? 'has-error' : ''}}" >
            <label for="projectinput1"> {{ trans('admin.lang_form_abbre') }} </label>
            <input type="text" value="{{ old('abbreviation') ?? $language->abbreviation}}" id="name"
                   class="form-control"
                   placeholder="{{ trans('admin.lang_form_enter_abbre') }}"
                   name="abbreviation">
            <span class="text-danger">{{$errors->has('abbreviation') ? $errors->first('abbreviation') : ''}}</span>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-md-6">
            <label for="projectinput2"> {{  trans('admin.lang_form_direction') }} </label>
            <select name="direction" class="select2 form-control">
                <optgroup label="{{trans('admin.lang_form_enter_direction') }} ">
                    <option value="rtl" @if($language->direction == 'rtl') selected @endif</option>{{trans('admin.lang_form_rtl') }}</option>
                    <option value="ltr" @if($language->direction == 'ltr') selected @endif>{{trans('admin.lang_form_ltr') }}</option>
                </optgroup>
            </select>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group {{$errors->has('active') ? 'has-error' : ''}} mt-1" >
            <input type="checkbox" name="active" value="1"
                   id="switcheryColor4"
                   class="switchery" data-color="success"
                   @if($language->active == 1) checked @endif
                   />
            <label for="switcheryColor4"
                   class="card-title ml-1">{{trans('admin.lang_status') }} </label> <br>
            <span class="text-danger">{{$errors->has('active') ? $errors->first('active') : ''}}</span>
        </div>
    </div>
</div>
</div>

