@extends('layouts.login.layout')
@section('content')
    <div class="page-content">
        <div class="page-brand-info">
            <div class="brand">
                <img class="brand-img" src="{{ asset('theme/images/logo@2x.png') }}" alt="...">
                <h2 class="brand-text font-size-40">{{ $config['web_name'] or config('APP_NAME')}}</h2>
            </div>
            <p class="font-size-20">{{ $config['login_message'] or ''}}</p>
        </div>
        <div class="page-login-main animation-slide-right animation-duration-1">
            <div class="brand hidden-md-up">
                <img class="brand-img" src="{{ asset('theme/images/logo-colored@2x.png') }}" alt="...">
                <h3 class="brand-text font-size-40">{{ $config['web_name'] or ''}}</h3>
            </div>
            <h3 class="font-size-24">@lang('login.agent_login_title')</h3>

            <form method="post" action="{{ route('login') }}">
                <div class="form-group">
                    <label class="sr-only" for="inputMobile">@lang('form.mobile'):</label>
                    <input type="text" class="form-control" id="inputMobile" name="mobile" placeholder="@lang('form.mobile')">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="inputPassword">@lang('form.password'):</label>
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="@lang('form.password')">
                </div>
                <div class="form-group clearfix">
                    <div class="checkbox-custom checkbox-inline checkbox-primary float-left">
                        <input type="checkbox" id="rememberMe" name="rememberMe">
                        <label for="rememberMe">@lang('form.remmber')</label>
                    </div>
                    <a class="float-right" href="javascript:void(0)">@lang('form.forget_password')</a>
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary btn-block">@lang('form.submit')</button>
            </form>
            <p>@lang('form.guest')? <a href="javascript:void(0)">@lang('form.register_user')</a></p>
            <footer class="page-copyright">
                <p>{{ $config['web_name'] or ''}}</p>
                <p>{{ $config['copyright'] or ''}}</p>
            </footer>
        </div>
    </div>
@endsection
