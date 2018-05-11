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
        <h1 class="page-title"><i class="icon wb-user"></i>[{{ $plan_detail['plan_name'] }}]@lang('student_plan.add_school')</h1>
        <div class="page-header-actions">
            <a href="{{ route('admin.plan.index',['student_id'=>$student_info['id'],'plan_id'=>$plan_detail['plan_id']]) }}" class="btn btn-sm btn-icon btn-primary btn-outline btn-round" title="@lang('type.back_type_list')">
                <i class="icon wb-reply" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="page-content">
        <form action="{{ route('admin.plan.search',['student_id'=>$student_info['id'],'plan_model_id'=>$plan_detail['id']]) }}" method="get">
            <div class="panel">
                <header class="panel-heading">
                    <h3 class="panel-title">@lang('student_plan.options')</h3>
                </header>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-control-label" for="inputIntentionCollege">@lang('student.intention_college')：</label>
                                    <div>
                                         <span class="mr-15">
                                              <input type="checkbox" class="icheckbox-primary ml-15" id="ProvinceAll" name="intention_college[]" data-plugin="iCheck" data-checkbox-class="icheckbox_flat-blue" value="0"/>
                                              <label for="ProvinceAll" class="ml--1 pb-15">@lang('form.all_province')</label>
                                        </span>
                                        @if(isset($province_list))
                                            @foreach($province_list as $province)
                                                <span class="mr-15">
                                                      <input type="checkbox" class="icheckbox-primary ml-15" id="ProvinceList" name="intention_college[]" data-plugin="iCheck" data-checkbox-class="icheckbox_flat-blue" value="{{ $province['id'] }}"/>
                                                      <label for="ProvinceList" class="ml--1 pb-15">{{ $province['name'] }}</label>
                                                </span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-control-label" for="inputscore">@lang('student.subject')：</label>
                                    <input type="text" class="form-control" id="inputscore" readonly value="@if($student_info['subjiect']==1) @lang('student.subject') @else @lang('student.arts') @endif" name="subject" placeholder="@lang('student.subject')" autocomplete="off">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-control-label" for="inputscore">@lang('student.exam_address_province_id')：</label>
                                    <input type="text" class="form-control" id="inputscore" readonly value="{{ $student_info['province']['name'] }}" name="exam_address_province_id" placeholder="@lang('student.exam_address_province_id')" autocomplete="off">
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="form-control-label" for="inputEstimateScore">@lang('student.estimate_score')：</label>
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputEstimateScore" name="estimate_lowest_score" value="" placeholder="@lang('student.estimate_lowest_score')" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputEstimateScore" name="estimate_highest_score" value="" placeholder="@lang('student.estimate_highest_score')" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-9">
                                    <label class="form-control-label" for="inputCollegeName">@lang('student_plan.college_name')：</label>
                                    <input type="text" class="form-control" id="inputCollegeName" name="college_name" placeholder="@lang('student_plan.college_name')" autocomplete="off">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="hidden" name="student_id" value="{{ $student_info['id'] }}">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="plan_id" value="{{ $plan_detail['id'] }}">
                                    <input type="submit" style="margin: 0px auto;display: table;" class="btn btn-primary" value="@lang('form.search_college')">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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