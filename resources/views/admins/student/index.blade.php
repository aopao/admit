@extends('layouts.layout')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('theme/vendor/toastr/toastr.css') }}">
@endsection
@section('content')
    <div class="page-header">
        <h1 class="page-title"><i class="icon wb-users"></i>@lang('student.list_student')</h1>
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
                                <th>@lang('form.id')</th>
                                <th>@lang('student.student_name')</th>
                                <th>@lang('student.exam_address_province_id')</th>
                                <th>@lang('student.mobile')</th>
                                <th class="hidden-sm-down">@lang('student.id_card')</th>
                                <th>@lang('student.planner')</th>
                                <th class="hidden-sm-down">@lang('form.created_at')</th>
                                <th>@lang('form.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($student_list))
                                @foreach($student_list as $student)
                                    <tr align="center">
                                        <td>
                                            <span class="checkbox-custom checkbox-primary">
                                              <input class="selectable-item" type="checkbox" id="row-{{ $student['id'] }}" value="{{ $student['id'] }}"><label for="row-{{ $student['id'] }}"></label>
                                            </span>
                                        </td>
                                        <td>{{ $student['id'] or ''}}</td>
                                        <td>{{ $student['student_name'] or ''}}</td>
                                        <td>{{ $student['province']['name'] or '未填写'}}</td>
                                        <td>{{ $student['mobile'] or '未填写'}}</td>
                                        <td class="hidden-sm-down">{{ $student['card'] or '未填写'}}</td>
                                        <td>{{ $student['user']['nickname'] or '未填写'}}</td>
                                        <td class="hidden-sm-down">{{ $student['created_at']  }}</td>
                                        <td>
                                            <a href="{{route('admin.student.show',['id'=>$student['id']])}}" class="btn btn-outline btn-success btn-xs"><i class="icon wb-eye" aria-hidden="true"></i></a>
                                            <a href="{{route('admin.student.edit',['id'=>$student['id']])}}" class="btn btn-outline btn-primary btn-xs"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                                            <a href="{{route('admin.student.destroy',['id'=>$student['id']])}}" class="btn btn-outline btn-warning btn-xs"><i class="icon wb-trash" aria-hidden="true"></i></a>
                                        </td>
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
                            <a href="{{ route('admin.student.create') }}" class="btn btn-outline btn-success btn-sm">@lang('student.change_planner')</a>
                            <a href="{{ route('admin.student.create') }}" class="btn btn-outline btn-danger btn-sm">@lang('form.delete')</a>
                        </div>
                        <div class="float-right">
                            <nav>
                                {{--@if(isset($key))--}}
                                {{--{!! $student_list->appends(['key'=>$key])->render() !!}--}}
                                {{--@else--}}
                                {{--{{ $student_list->links() }}--}}
                                {{--@endif--}}
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
    <script>
        @if(Session::has('message'))
        toastr.success('{{Session::get("message")}}', '');
        @endif
    </script>
@endsection