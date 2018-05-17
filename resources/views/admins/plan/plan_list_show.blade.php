@extends('layouts.layout')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('theme/vendor/toastr/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/sweetalert.css') }}">
@endsection
@section('content')
    <div class="page-header">
        <h1 class="page-title"><i class="icon wb-library"></i>@lang('student_plan.show_college')</h1>
        <div class="page-header-actions">
            <a href="{{ route('admin.plan.index',['student_id'=>$student_info['id'],'plan_id'=>$plan_detail[ 'plan_id' ]]) }}" class="btn btn-sm btn-icon btn-primary btn-outline btn-round" title="@lang('type.back_type_list')">
                <i class="icon wb-reply" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="card-block ">
                <div class="project-controls clearfix">
                    <div class="float-left">
                    </div>
                    <div class="float-right">
                        <div class="form-group mb--1">
                            <div class="input-group">
                                        <span class="input-group-btn">
                                        </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body pt-0">
                <!-- Table Selectable -->
                <div class="mt--1">
                    <form action="">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr align="center">
                                <th>@lang('college.year')</th>
                                <th>@lang('college.college_name')</th>
                                <th>@lang('college.major')</th>
                                <th>@lang('college.province')</th>
                                <th>@lang('college.college_batch')</th>
                                <th>@lang('college.subject')</th>
                                <th>@lang('college.plan_number')</th>
                                <th>@lang('college.﻿lowest_score')</th>
                                <th>@lang('college.﻿lowest_rank')</th>
                                <th>@lang('college.﻿lowest_line')</th>
                                <th>@lang('college.average_score')</th>
                                <th>@lang('college.average_rank')</th>
                                <th>@lang('college.average_line')</th>
                                <th>@lang('college.advantage')</th>
                                <th>@lang('college.explain')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($admit_lists))
                                @foreach($admit_lists as $admit)
                                    <tr align="center" class="td-{{$admit['_id']}}">
                                        <td>{{ $admit['year'] or '未填写'}}</td>
                                        <td>{{ $admit['school'] or ''}}</td>
                                        <td>{{ $admit['major'] or '未填写'}}</td>
                                        <td>{{ $admit['provinces'] or '未填写'}}</td>
                                        <td class="hidden-sm-down">{{ $admit['batch'] or '未填写'}}</td>
                                        <td>{{ $admit['subject'] or '未填写'}}</td>
                                        <td>{{ $admit['planNumbers'] or '-'}}</td>
                                        <td>{{ $admit['lowest'] or '-'}}</td>
                                        <td>{{ $admit['lowRanking'] or '-'}}</td>
                                        <td>{{ $admit['lowLine'] or '-'}}</td>
                                        <td>{{ $admit['average'] or '-'}}</td>
                                        <td>{{ $admit['averageRanking'] or '-'}}</td>
                                        <td>{{ $admit['averageLine'] or '-'}}</td>
                                        <td>{{ $admit['advantage'] or '-'}}</td>
                                        <td>{{ $admit['explain'] or '-'}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="card-block p-0">
                    <div class="project-controls clearfix" style="border: none">
                        <div class="float-left">
                        </div>
                        <div class="float-right">
                            <nav>
                                @if(isset($query_params))
                                    {!! $admit_lists->appends($query_params)->render() !!}
                                @else
                                    {{ $admit_lists->links() }}
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- End Table Selectable -->
            </div>
        </div>
    </div>
@endsection
@section('page-js')
    <script src="{{ asset('theme/vendor/toastr/toastr.js') }}"></script>
    <script src="{{ asset('theme/js/sweetalert.js') }}"></script>
@endsection