@extends('layouts.layout')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('theme/vendor/formvalidation/formValidation.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/icheck/icheck.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/bootstrap-datepicker/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/forms/validation.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/vendor/select2/select2.css') }}">
@endsection
@section('content')
    <div class="page-header">
        <h1 class="page-title"><i class="icon wb-user" aria-hidden="true"></i>{{ $college_info['﻿college_name'] }}</h1>
        <div class="page-header-actions">
            <a href="{{ route('admin.college.index') }}" class="btn btn-sm btn-icon btn-primary btn-outline btn-round" title="@lang('college.college_list')">
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
                            <li class="nav-item" role="presentation"><a class="nav-link active">@lang('college.college_info')</a></li>
                            {{--                            <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('admin.plan.index',['student_id'=>$student_info['id'],'plane_id'=>config('plan.college_scheme.id')]) }}" aria-controls="info" role="tab">{{ config('plan.college_scheme.title') }}</a></li>--}}
                            {{--                            <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('admin.plan.index',['student_id'=>$student_info['id'],'plane_id'=>config('plan.estimate_score_scheme.id')]) }}" aria-controls="info" role="tab">{{ config('plan.estimate_score_scheme.title') }}</a></li>--}}
                            {{--                            <li class="nav-item" role="presentation"><a class="nav-link" href="{{ route('admin.plan.index',['student_id'=>$student_info['id'],'plane_id'=>config('plan.knowledge_score_scheme.id')]) }}" aria-controls="info" role="tab">{{ config('plan.knowledge_score_scheme.title') }}</a></li>--}}
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active animation-slide-left" id="info" role="tabpanel">
                                <div class="panel">
                                    <div class="panel-body container-fluid">
                                        <div class="row row-lg">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="form-control-label" for="inputCollegeName">@lang('college.college_name')：</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icon wb-library" aria-hidden="true"></i></span>
                                                            <input type="text" class="form-control" disabled name="college_name" value="{{  $college_info['﻿college_name'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="form-control-label" for="inputProvinceId">@lang('college.province_id')：</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icon wb-map" aria-hidden="true"></i></span>
                                                            <input type="text" class="form-control" disabled name="province_id" value="{{ $college_info['province']['name'] or 'NULL' }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="form-control-label" for="inputCityId">@lang('college.city_id')：</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icon wb-home" aria-hidden="true"></i></span>
                                                            <input type="text" class="form-control" disabled name="city_id" value="{{ $college_info['city']['name'] or 'NULL' }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="form-control-label" for="inputCategoryId">@lang('college.category_id')：</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icon wb-globe" aria-hidden="true"></i></span>
                                                            <input type="text" class="form-control" disabled name="category_id" value="{{ $college_info['CollegeCategory']['category_name'] or 'NULL' }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="form-control-label" for="inputIsTopCollege">@lang('college.is_top_college')：</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icon wb-plugin" aria-hidden="true"></i></span>
                                                            <input type="text" class="form-control" disabled name="is_top_college" value="{{ $college_info['is_top_college'] or 'NULL' }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4"></div>
                                                    <div class="form-group col-md-12">
                                                        <label class="form-control-label" for="inputAdmission">@lang('college.admission')：</label>
                                                        <div>
                                                            <textarea class="form-control" id="inputAdmission" name="admission" rows="3" disabled data-fv-field="other_note">{{ $college_info['admission'] or '暂未填写' }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="form-control-label" for="inputAdmissionDetail">@lang('college.admission_detail')：</label>
                                                        <div>
                                                            <textarea class="form-control" id="inputAdmissionDetail" name="admission_detail" rows="3" disabled data-fv-field="other_note">{{ $college_info['admission_detail'] or '暂未填写' }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="form-control-label" for="inputAdmissionScale">@lang('college.admission_scale')：</label>
                                                        <div>
                                                            <textarea class="form-control" id="inputAdmissionScale" name="admission_detail" rows="3" disabled data-fv-field="other_note">{{ $college_info['admission_scale'] or '暂未填写' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <script src="{{ asset('theme/vendor/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script>
        $("#datepicker").datepicker({format: 'yyyy-mm-dd'});
        //TODO
        //省份+城市
    </script>
    <script src="{{ asset('theme/js/Student/app.js') }}"></script>

@endsection