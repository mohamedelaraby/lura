@extends('layouts.admin')

@section('title')
{{ trans('admin.main_categories') }}
@endsection
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> {{ trans('admin.main_categories') }} </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">{{ trans('admin.dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active">  {{ trans('admin.main_categories') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> {{ trans('admin.main_categories') }}</h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            @include('admin.includes.alerts.messages')


                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table
                                        class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead>
                                        <tr>
                                            <th> {{ trans('admin.maincategory_name') }}</th>
                                            <th> {{ trans('admin.maincategory_lang') }}</th>
                                            <th> {{ trans('admin.maincategory_photo') }}</th>
                                            <th> {{ trans('admin.maincategory_status') }}</th>
                                            <th> {{ trans('admin.options') }}</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                            @isset($mainCategories)
                                            @foreach($mainCategories as $mainCategory)


                                                <tr>
                                                    <td>{{ $mainCategory->name }} </td>
                                                    <td>{{ default_language()}} </td>
                                                <td><img  class="thumb" src="{{$mainCategory->photo}}" alt="{{$mainCategory->photo}}"></td>
                                                    <td>{{ $mainCategory->getActive() }} </td>

                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{ route('admin.maincategory.edit',$mainCategory->id) }}"
                                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">
                                                               {{ trans('admin.edit') }}
                                                            </a>
                                                            <a href="{{ route('admin.maincategory.delete',$mainCategory->id) }}"
                                                               class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
                                                               {{ trans('admin.delete') }}
                                                            </a>
                                                            
                                                            <a href="#"
                                                               class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                               {{ trans('admin.valid') }}
                                                            </a>


                                                        </div>
                                                    </td>
                                                </tr>

                                                @endforeach
                                                @endisset
                                        </tbody>
                                    </table>
                                    <div class="justify-content-center d-flex">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
