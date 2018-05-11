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
        <h1 class="page-title"><i class="icon wb-user"></i>@lang('student.edit_student')</h1>
        <div class="page-header-actions">
            <a href="{{ route('admin.student.show',['id'=>$student_info]) }}" class="btn btn-sm btn-icon btn-primary btn-outline btn-round" title="@lang('type.back_type_list')">
                <i class="icon wb-reply" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="page-content">
        <form action="{{ route('admin.student.update',['id'=>$student_info['id']]) }}" method="post">
            <div class="panel">
                <header class="panel-heading">
                    <h3 class="panel-title">@lang('student.student_basic_info')</h3>
                </header>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-3 ">
                                    <label class="form-control-label" for="inputStudentName">@lang('student.student_name')：</label>
                                    <input type="text" class="form-control {{ $errors->has('student_name')?'is-invalid':'' }}" id="inputStudentName" value="{{ $student_info['student_name'] }}" name="student_name" placeholder="@lang('student.student_name')" autocomplete="off">
                                    @if ($errors->has('student_name'))
                                        <div class="invalid-feedback">{{ $errors->first('student_name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label class="form-control-label" for="inputAge">@lang('student.age')：</label>
                                    <input type="text" class="form-control {{ $errors->has('age')?'is-invalid':'' }}" id="inputAge" name="age" value="{{ $student_info['age'] }}" placeholder="@lang('student.age')" autocomplete="off">
                                    @if ($errors->has('age'))
                                        <div class="invalid-feedback">{{ $errors->first('age') }}</div>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label class="form-control-label" for="inputNation">@lang('student.nation')：</label>
                                    <input type="text" class="form-control" id="inputNation" name="nation" placeholder="@lang('student.nation')" value="{{ $student_info['nation'] }}" autocomplete="off">
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label class="form-control-label" for="inputIdCard">@lang('student.id_card')：</label>
                                    <input type="text" class="form-control" id="inputIdCard" name="id_card" placeholder="@lang('student.id_card')" value="{{ $student_info['id_card'] }}" autocomplete="off">
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label class="form-control-label" for="inputContact">@lang('student.contact')：</label>
                                    <input type="text" class="form-control" id="inputContact" name="contact" placeholder="@lang('student.contact')" value="{{ $student_info['contact'] }}" autocomplete="off">
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label class="form-control-label" for="inputMobile">@lang('student.mobile')：</label>
                                    <input type="text" class="form-control" id="inputMobile" name="mobile" placeholder="@lang('student.mobile')" value="{{ $student_info['mobile'] }}" autocomplete="off">
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label class="form-control-label" for="inputSchool">@lang('student.school')：</label>
                                    <input type="text" class="form-control" id="inputSchool" name="school" placeholder="@lang('student.school')" value="{{ $student_info['school'] }}" autocomplete="off">
                                </div>
                                <div class="form-group col-md-3 ">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-control-label" for="inputSex">@lang('student.sex')：</label>
                                    <div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input type="radio" id="inputSex" name="sex" @if($student_info['sex'] == 0 ) checked @endif value="0">
                                            <label for="inputSex">@lang('student.male')</label>
                                        </div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input type="radio" id="inputSex" name="sex" @if($student_info['sex'] == 1 ) checked @endif value="1">
                                            <label for="inputBasicFemale">@lang('student.female')</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-control-label" for="inputSubject">@lang('student.subject')：</label>
                                    <div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input type="radio" id="inputSubject" name="subject" @if($student_info['subject'] == 0 ) checked @endif  value="0">
                                            <label for="inputSubject">@lang('student.arts')</label>
                                        </div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input type="radio" id="inputSubject" name="subject" @if($student_info['subject'] == 0 ) checked @endif value="1">
                                            <label for="inputSubject">@lang('student.science')</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 ">
                                </div>
                                <div class="form-group col-md-3 form-inline pt-15">
                                    <label class="form-control-label" for="inputAddress">@lang('student.exam_address_province_id')：</label>
                                    <select class="form-control" name="exam_address_province_id" data-plugin="select2" id="exam_address_province_id" style="width: 150px">
                                        @if(isset($province_list))
                                            @foreach($province_list as $province)
                                                <option value="{{ $province['id'] }}" @if($province['id'] == $student_info['province_id']) selected @endif>{{ $province['name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-md-9 form-inline pt-15">
                                    <label class="form-control-label">@lang('student.province_id')：&nbsp;</label>
                                    <div>
                                        <select class="form-control" name="province_id" data-plugin="select2" id="province" style="width: 150px">
                                            @if(isset($province_list))
                                                @foreach($province_list as $province)
                                                    <option value="{{ $province['id'] }}" @if($province['id'] == $student_info['province_id']) selected @endif>{{ $province['name'] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="ml-15">
                                        <select class="form-control" name="city_id" data-plugin="select2" id="city" style="width: 150px">
                                            <option value="0">@lang('student.orselect')</option>
                                        </select>
                                    </div>
                                    <div class="ml-15">
                                        <select class="form-control" name="area_id" data-plugin="select2" id="area" style="width: 150px">
                                            <option value="0">@lang('student.orselect')</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <header class="panel-heading">
                    <h3 class="panel-title">@lang('student.student_score_info')</h3>
                </header>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label class="form-control-label" for="inputEstimateScore">@lang('student.estimate_score')：</label>
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputEstimateScore" name="estimate_lowest_score" value="{{ $student_info['estimate_lowest_score'] }}" placeholder="@lang('student.estimate_lowest_score')" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputEstimateScore" name="estimate_highest_score" value="{{ $student_info['estimate_highest_score'] }}" placeholder="@lang('student.estimate_highest_score')" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="form-control-label" for="inputEstimateRank">@lang('student.estimate_rank')：</label>
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputEstimateRank" name="estimate_lowest_rank" value="{{ $student_info['estimate_highest_score'] }}" placeholder="@lang('student.estimate_lowest_rank')" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputEstimateRank" name="estimate_highest_rank" value="{{ $student_info['estimate_highest_score'] }}" placeholder="@lang('student.estimate_highest_rank')" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="form-control-label" for="inputOneModeScore">@lang('student.one_mode_score')/@lang('student.one_mode_rank')：</label>
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputOneModeScore" name="one_mode_score" value="{{ $student_info['one_mode_score'] }}" placeholder="@lang('student.one_mode_score')" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputOneModeScore" name="one_mode_rank" value="{{ $student_info['one_mode_rank'] }}" placeholder="@lang('student.one_mode_rank')" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="form-control-label" for="inputTwoModeScore">@lang('student.two_mode_score')/@lang('student.two_mode_rank')：</label>
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputTwoModeScore" name="two_mode_score" value="{{ $student_info['two_mode_score'] }}" placeholder="@lang('student.two_mode_score')" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputTwoModeScore" name="two_mode_rank" value="{{ $student_info['two_mode_rank'] }}" placeholder="@lang('student.two_mode_rank')" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="form-control-label" for="inputThreeModeScore">@lang('student.three_mode_score')/@lang('student.three_mode_rank')：</label>
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputThreeModeScore" name="three_mode_score" value="{{ $student_info['three_mode_score'] }}" placeholder="@lang('student.three_mode_score')" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputThreeModeScore" name="three_mode_rank" value="{{ $student_info['three_mode_rank'] }}" placeholder="@lang('student.three_mode_rank')" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="form-control-label" for="inputscore">@lang('student.score')：</label>
                                    <input type="text" class="form-control" id="inputscore" name="score" value="{{ $student_info['score'] }}" placeholder="@lang('student.score')" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <header class="panel-heading">
                    <h3 class="panel-title">@lang('student.student_exam_info')</h3>
                </header>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-3 ">
                                    <label class="form-control-label" for="inputExamScore">@lang('student.exam_score')：</label>
                                    <input type="text" class="form-control" id="inputExamScore" name="exam_score" value="{{ $student_info['exam_score'] }}" placeholder="@lang('student.exam_score')" autocomplete="off">
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label class="form-control-label" for="inputProvinceRank">@lang('student.province_rank')：</label>
                                    <input type="text" class="form-control" id="inputProvinceRank" name="province_rank" value="{{ $student_info['province_rank'] }}" placeholder="@lang('student.province_rank')" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <header class="panel-heading">
                    <h3 class="panel-title">@lang('student.student_purpose_info')</h3>
                </header>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="form-control-label" for="inputIsConsiderMilitarySchool">@lang('student.is_consider_military_school')：</label>
                                    <div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input type="radio" id="inputIsConsiderMilitarySchool" @if($student_info['is_consider_military_school'] == 0) checked @endif name="is_consider_military_school" value="0">
                                            <label for="inputIsConsiderMilitarySchool">@lang('form.no')</label>
                                        </div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input type="radio" id="inputIsConsiderMilitarySchool" @if($student_info['is_consider_military_school'] == 1) checked @endif name="is_consider_military_school" value="1">
                                            <label for="inputIsConsiderMilitarySchool">@lang('form.yes')</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-control-label" for="inputIsConsiderPoliceSchool">@lang('student.is_consider_police_school')：</label>
                                    <div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input type="radio" id="inputIsConsiderPoliceSchool" @if($student_info['is_consider_police_school'] == 0) checked @endif name="is_consider_police_school" value="0">
                                            <label for="inputIsConsiderPoliceSchool">@lang('form.no')</label>
                                        </div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input type="radio" id="inputIsConsiderPoliceSchool" @if($student_info['is_consider_police_school'] == 0) checked @endif name="is_consider_police_school" value="1">
                                            <label for="inputIsConsiderPoliceSchool">@lang('form.yes')</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-control-label" for="inputIsConsiderTeachersSchool">@lang('student.is_consider_teachers_school')：</label>
                                    <div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input type="radio" id="inputIsConsiderTeachersSchool" @if($student_info['is_consider_teachers_school'] == 0) checked @endif name="is_consider_teachers_school" value="0">
                                            <label for="inputIsConsiderTeachersSchool">@lang('form.no')</label>
                                        </div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input type="radio" id="inputIsConsiderTeachersSchool" @if($student_info['is_consider_teachers_school'] == 0) checked @endif name="is_consider_teachers_school" value="1">
                                            <label for="inputIsConsiderTeachersSchool">@lang('form.yes')</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-control-label" for="inputIsConsiderDirectionalSchool">@lang('student.is_consider_directional_school')：</label>
                                    <div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input type="radio" id="inputIsConsiderDirectionalSchool" @if($student_info['is_consider_directional_school'] == 0) checked @endif name="is_consider_directional_school" value="0">
                                            <label for="inputIsConsiderDirectionalSchool">@lang('form.no')</label>
                                        </div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input type="radio" id="inputIsConsiderDirectionalSchool" @if($student_info['is_consider_directional_school'] == 0) checked @endif name="is_consider_directional_school" value="1">
                                            <label for="inputIsConsiderDirectionalSchool">@lang('form.yes')</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-control-label" for="inputIsConsiderCampusSchool">@lang('student.is_consider_campus_school')：</label>
                                    <div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input type="radio" id="inputIsConsiderCampusSchool" @if($student_info['is_consider_campus_school'] == 0) checked @endif name="is_consider_campus_school" value="0">
                                            <label for="inputSelect5">@lang('form.no')</label>
                                        </div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input type="radio" id="inputIsConsiderCampusSchool" @if($student_info['is_consider_campus_school'] == 0) checked @endif name="is_consider_campus_school" value="1">
                                            <label for="inputIsConsiderCampusSchool">@lang('form.yes')</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-control-label" for="inputIsConsiderForeignSchool">@lang('student.is_consider_foreign_school')：</label>
                                    <div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input type="radio" id="inputIsConsiderForeignSchool" @if($student_info['is_consider_foreign_school'] == 0) checked @endif name="is_consider_foreign_school" value="0">
                                            <label for="inputIsConsiderForeignSchool">@lang('form.no')</label>
                                        </div>
                                        <div class="radio-custom radio-default radio-inline">
                                            <input type="radio" id="inputIsConsiderForeignSchool" @if($student_info['is_consider_foreign_school'] == 0) checked @endif name="is_consider_foreign_school" value="1">
                                            <label for="inputIsConsiderForeignSchool">@lang('form.yes')</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-control-label" for="inputIntentionCollege">@lang('student.intention_college')：</label>
                                    <div>
                                         <span class="mr-15">
                                              <input type="checkbox" class="icheckbox-primary ml-15" id="ProvinceAll" @if($student_info['intention_college'][0] == 0) ckecked @endif name="intention_college[]" data-plugin="iCheck" data-checkbox-class="icheckbox_flat-blue" value="0"/>
                                              <label for="ProvinceAll" class="ml--1 pb-15">@lang('form.all_province')</label>
                                        </span>
                                        @if(isset($province_list))
                                            @foreach($province_list as $province)
                                                <span class="mr-15">
                                                      <input type="checkbox" class="icheckbox-primary ml-15" id="ProvinceList" @if(in_array($province['id'],$student_info['intention_college'])) checked @endif name="intention_college[]" data-plugin="iCheck" data-checkbox-class="icheckbox_flat-blue" value="{{ $province['id'] }}"/>
                                                      <label for="ProvinceList" class="ml--1 pb-15">{{ $province['name'] }}</label>
                                                </span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-control-label" for="inputIntentionMajor">@lang('student.intention_major')：</label>
                                    <div>
                                        <textarea class="form-control" name="intention_major" id="inputIntentionMajor" rows="3" data-fv-field="intention_major">{{ $student_info['intention_major'] }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-control-label" for="inputMedicalNote">@lang('student.medical_note')：</label>
                                    <div>
                                        <textarea class="form-control" id="inputMedicalNote" name="medical_note" rows="3" data-fv-field="medical_note">{{ $student_info['medical_note'] }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-control-label" for="inputOtherNote">@lang('student.other_note')：</label>
                                    <div>
                                        <textarea class="form-control" id="inputOtherNote" name="other_note" rows="3" data-fv-field="other_note">{{ $student_info['other_note'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <header class="panel-heading">
                    <h3 class="panel-title">@lang('student.student_active_info')</h3>
                </header>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="form-control-label" for="inputContact">@lang('student.created_at')：</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="icon wb-calendar" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" disabled name="created_at" value="{{ date('Y-m-d H:i:s',time()) }}">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-control-label" for="inputActiveDate">@lang('student.active_date')：</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="icon wb-calendar" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" disabled name="active_date" value="{{ date('Y-m-d',time()) }}">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-control-label" for="inputExpirationTime">@lang('student.expiration_time')：</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="icon wb-calendar" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="expiration_time" data-plugin="datepicker" id="Datepicker">
                                    </div>
                                </div>
                            </div>
                            <div id="row">
                                <div>
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="submit" style="margin: 0px auto;display: table;" class="btn btn-primary" value="@lang('form.edit')">
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