<h4 class="form-section"><i class="ft-home"></i> {{ trans('admin.lang_data') }} </h4>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="projectinput1"> {{ trans('admin.lang_form_name') }} </label>
            <input type="text" value="" id="name"
                   class="form-control"
                   placeholder=" {{ trans('admin.lang_form_enter_name') }}"
                   name="name">
            <span class="text-danger"> </span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="projectinput1"> {{ trans('admin.lang_form_abbre') }} </label>
            <input type="text" value="" id="name"
                   class="form-control"
                   placeholder="{{ trans('admin.lang_form_enter_abbre') }}"
                   name="name">
            <span class="text-danger"> </span>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="projectinput2"> {{  trans('admin.lang_form_direction') }} </label>
            <select name="academy_id" class="select2 form-control">
                <optgroup label="{{trans('admin.lang_form_enter_direction') }} ">
                    <option value="rtl">{{trans('admin.lang_form_rtl') }}</option>
                    <option value="ltr">{{trans('admin.lang_form_ltr') }}</option>
                </optgroup>
            </select>
            <span class="text-danger"> </span>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group mt-1">
            <input type="checkbox" name="status"
                   id="switcheryColor4"
                   class="switchery" data-color="success"
                   checked/>
            <label for="switcheryColor4"
                   class="card-title ml-1">{{trans('admin.lang_status') }} </label>
        </div>
    </div>
</div>
</div>
