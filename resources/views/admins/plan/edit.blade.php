@extends('layouts.layout')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('theme/vendor/toastr/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/sweetalert.css') }}">
@endsection
@section('content')
    <div class="page-header">
        <h1 class="page-title"><i class="icon wb-order" aria-hidden="true"></i>{{ $plan_info['plan_name'] }}@lang('student_plan.edit')</h1>
        <div class="page-header-actions">
            <a href="{{ route('admin.student.index') }}" class="btn btn-sm btn-icon btn-primary btn-outline btn-round" title="@lang('type.back_type_list')">
                <i class="icon wb-reply" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <!-- Panel -->
                <div class="panel">
                    <div class="panel-body nav-tabs-animate nav-tabs-horizontal" data-plugin="tabs">
                        <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="" aria-controls="info" role="tab">@lang('student_plan.edit')</a></li>
                            {{--<li class="nav-item" role="presentation"><a class="nav-link @if($plan_id==3) active @endif" href="{{ route('admin.plan.index',['student_id'=>$student_info['id'],'plane_id'=>config('plan.knowledge_score_scheme.id')]) }}" aria-controls="info" role="tab">{{ config('plan.knowledge_score_scheme.title') }}</a></li>--}}
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active animation-slide-left" id="info" role="tabpanel">
                                <form action="{{ route('admin.plan.update',['student_id'=>$plan_info['student_id'],'id'=>$plan_info['id']]) }}" method="post">
                                    <div class="panel">
                                        <div class="panel-body container-fluid">
                                            <div class="row row-lg">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label class="form-control-label" for="inputPlanName">@lang('student_plan.plan_name')：</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="icon wb-home" aria-hidden="true"></i></span>
                                                                <input type="text" class="form-control" name="plan_name" value="{{ $plan_info['plan_name'] }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="row">
                                        <div>
                                            {{ csrf_field() }}
                                            <input type="hidden" name="student_id" value="{{ $plan_info['student_id'] }}">
                                            <input type="hidden" name="user_id" value="{{ $plan_info['user_id'] }}">
                                            <input type="hidden" name="id" value="{{ $plan_info['id'] }}">
                                            <input type="hidden" name="plan_id" value="{{ $plan_info['plan_id'] }}">
                                            <input type="submit" style="margin: 0px auto;display: table;" class="btn btn-primary" value="@lang('form.create')">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel -->
            </div>
        </div>
    </div>
@endsection
@section('page-js')
    <script src="{{ asset('theme/vendor/toastr/toastr.js') }}"></script>
    <script src="{{ asset('theme/js/sweetalert.js') }}"></script>
    <script>

    </script>
@endsection