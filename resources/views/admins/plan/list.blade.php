@extends('layouts.layout')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('theme/vendor/toastr/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/sweetalert.css') }}">
@endsection
@section('content')
    <div class="page-header">
        <h1 class="page-title"><i class="icon wb-users"></i>@lang('student.list_student')</h1>
        <div class="page-header-actions">
            <a href="{{ route('admin.student.index') }}" class="btn btn-sm btn-icon btn-primary btn-outline btn-round" title="@lang('type.back_type_list')">
                <i class="icon wb-reply" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="card-block ">
                <div class="project-controls clearfix">
                    <div class="float-left">
                        <a href="{{ route('admin.student.create') }}" class="btn btn-outline btn-primary">@lang('student.create_student')</a>
                        {{--                    <a href="{{ route('admin.student.pro_search') }}" class="btn btn-outline btn-info">@lang('form.pro_search')</a>--}}
                    </div>
                    <div class="float-right">
                        <form action="">
                            <div class="form-group mb--1">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="key" value="{{ $key or '' }}" placeholder="@lang('student.search_tips')">
                                    <span class="input-group-btn">
                                    <input type="submit" class="btn btn-primary" value="@lang('form.search')"/>
                                </span>
                                </div>
                            </div>
                        </form>
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
                                <th class="w-50">
                            <span class="checkbox-custom checkbox-primary">
                              <input class="selectable-all" type="checkbox"><label></label>
                            </span>
                                </th>
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
                                    <tr align="center" class="td-{{$admit['id']}}">
                                        <td>
                                            <span class="checkbox-custom checkbox-primary">
                                              <input class="selectable-item" type="checkbox" id="row-{{ $admit['id'] }}" value="{{ $admit['id'] }}"><label for="row-{{ $admit['id'] }}"></label>
                                            </span>
                                        </td>
                                        <td>{{ $admit['year'] or '未填写'}}</td>
                                        <td>{{ $admit['college'] or ''}}</td>
                                        <td>{{ $admit['major'] or '未填写'}}</td>
                                        <td>{{ $admit['province'] or '未填写'}}</td>
                                        <td class="hidden-sm-down">{{ $admit['college_batch'] or '未填写'}}</td>
                                        <td>{{ $admit['subject'] or '未填写'}}</td>
                                        <td>{{ $admit['plan_number'] or '-'}}</td>
                                        <td>{{ $admit['﻿lowest_score'] or '-'}}</td>
                                        <td>{{ $admit['﻿lowest_rank'] or '-'}}</td>
                                        <td>{{ $admit['﻿lowest_line'] or '-'}}</td>
                                        <td>{{ $admit['average_score'] or '-'}}</td>
                                        <td>{{ $admit['average_rank'] or '-'}}</td>
                                        <td>{{ $admit['average_line'] or '-'}}</td>
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
                            {{--<a href="{{ route('admin.student.create') }}" class="btn btn-outline btn-success btn-sm">@lang('student.change_planner')</a>--}}
                            {{--<a href="{{ route('admin.student.create') }}" class="btn btn-outline btn-danger btn-sm">@lang('form.delete')</a>--}}
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
    <script>
        @if(Session::has('message'))
        toastr.success('{{Session::get("message")}}', '');
        @endif
        $('.del').click(function () {
            let id = $(this).data('id');
            let url = "http://admit.ma/admin/student/" + id;
            swal({
                    title: "确定删除吗？",
                    text: "你将无法恢复该数据！",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定删除！",
                    cancelButtonText: "取消删除！",
                    closeOnConfirm: false
                },
                function () {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {'_token': '{{ csrf_token() }}'},
                        success: function (data) {
                            swal({
                                title: "删除成功！",
                                text: "1秒后自动关闭。",
                                timer: 1000,
                                showConfirmButton: false
                            });
                            $('.td-' + id).remove()
                        }
                    });
                });

        });
    </script>
@endsection