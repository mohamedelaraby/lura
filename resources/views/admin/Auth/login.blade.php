@extends('layouts.login')

@section('title')
{{ trans('auth.login') }}
@endsection
@section('content')

    <section class="flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <div class="p-1">
                                <img src="{{ asset('/assets/admin/images/logo/logo.png') }}" alt="LOGO"/>
                            </div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                            <span>{{ trans('auth.enter_admin_panel') }} </span>
                        </h6>
                    </div>

                    {{--  Start Error Messages  --}}
                        @include('admin.includes.alerts.messages')

                    {{--  End Error Messages  --}}
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form-horizontal form-simple" action="{{ route('admin.login') }}" method="post"
                                  novalidate>
                                  @csrf
                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                    <input type="text" name="email"
                                           class="form-control form-control-lg input-lg"
                                           value="" id="email" placeholder="{{ trans('auth.enter-email') }} ">
                                    <div class="form-control-position">
                                        <i class="ft-user"></i>
                                    </div>

                                    <span class="text-danger"> </span>

                                </fieldset>
                                <fieldset class="form-group position-relative has-icon-left">
                                    <input type="password" name="password"
                                           class="form-control form-control-lg input-lg"
                                           id="user-password"
                                           placeholder="{{ trans('auth.enter-password') }}">
                                    <div class="form-control-position">
                                        <i class="la la-key"></i>
                                    </div>
                                    <span class="text-danger"> </span>
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-md-6 col-12 text-center text-md-left">
                                        <fieldset>
                                            <input type="checkbox" name="remember_me" id="remember-me"
                                                   class="chk-remember">
                                            <label for="remember-me">{{ trans('auth.rememberme') }}</label>
                                        </fieldset>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-lg btn-block"><i
                                        class="ft-unlock"></i>
                                    {{ trans('auth.signin') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
