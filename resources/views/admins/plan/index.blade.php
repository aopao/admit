@extends('layouts.layout')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('theme/vendor/toastr/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/sweetalert.css') }}">
@endsection
@section('content')
    <div class="page-header">
        <h1 class="page-title"><i class="icon wb-order" aria-hidden="true"></i>{{ $student_info['student_name'] }}@lang('student_plan.detail')</h1>
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
                            <li class="nav-item" role="presentation"><a href="{{ route('admin.student.show',['id'=>$student_info['id']]) }}" class="nav-link">@lang('student.student_info')</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link @if($plan_id==1) active @endif" href="{{ route('admin.plan.index',['student_id'=>$student_info['id'],'plane_id'=>config('plan.college_scheme.id')]) }}" aria-controls="info" role="tab">{{ config('plan.college_scheme.title') }}</a></li>
{{--                            <li class="nav-item" role="presentation"><a class="nav-link @if($plan_id==2) active @endif" href="{{ route('admin.plan.index',['student_id'=>$student_info['id'],'plane_id'=>config('plan.estimate_score_scheme.id')]) }}" aria-controls="info" role="tab">{{ config('plan.estimate_score_scheme.title') }}</a></li>--}}
                            <li class="nav-item" role="presentation"><a class="nav-link @if($plan_id==3) active @endif" href="{{ route('admin.plan.index',['student_id'=>$student_info['id'],'plane_id'=>config('plan.knowledge_score_scheme.id')]) }}" aria-controls="info" role="tab">{{ config('plan.knowledge_score_scheme.title') }}</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active animation-slide-left">
                                <div class="panel-body p-1 pt-10">
                                    <div class="card-block pl-0 pt-0 pb-10">
                                        <div class="project-controls clearfix">
                                            <div class="float-left">
                                                <a href="javascript:void(0)" id="create_plan" class="btn btn-outline btn-success btn-sm">@lang('student_plan.create_plan')</a>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="">
                                        <table class="table table-hover table-bordered table-striped">
                                            <thead>
                                            <tr align="center">
                                                <th>@lang('student_plan.plan_number')</th>
                                                <th>@lang('student_plan.plan_name')</th>
                                                <th>@lang('student_plan.user_id')</th>
                                                <th class="hidden-sm-down">@lang('student_plan.status')</th>
                                                <th class="hidden-sm-down">@lang('student_plan.created_at')</th>
                                                <th>@lang('student_plan.action')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($plan_list))
                                                @foreach($plan_list as $plan)
                                                    <tr align="center" class="td-{{ $plan['id'] }}">
                                                        <td>{{ $plan['plan_number'] }}</td>
                                                        <td>{{ $plan['plan_name'] }}</td>
                                                        <td>{{ $plan['user']['nickname'] }}</td>
                                                        <td>
                                                            @if($plan['is_close'] == 0)
                                                                <span class="badge badge-success">@lang('student_plan.ok')</span>
                                                            @else
                                                                <span class="badge badge-danger">@lang('student_plan.no')</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $plan['created_at'] }}</td>
                                                        <td>
                                                            <a href="{{route('admin.plan.show',['student_id'=>$student_info['id'],'plan_model_id'=>$plan['id']])}}" class="btn btn-outline btn-success btn-xs"><i class="icon wb-eye" aria-hidden="true"></i></a>
                                                            <a href="{{route('admin.plan.edit',['student_id'=>$student_info['id'],'plan_model_id'=>$plan['id']])}}" class="btn btn-outline btn-primary btn-xs"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                                                            <a href="javascript:void(0)" data-id="{{ $plan['id'] }}" class="btn btn-outline btn-warning btn-xs del"><i class="icon wb-trash" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                            <div class="card-block p-0">
                                <div class="project-controls clearfix" style="border: none">
                                    <div class="float-right">
                                        <nav>
                                        </nav>
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
    <script src="{{ asset('theme/vendor/toastr/toastr.js') }}"></script>
    <script src="{{ asset('theme/js/sweetalert.js') }}"></script>
    <script>
        $('#create_plan').click(function () {
            $.ajax({
                url: "{{ route('admin.plan.create',['student_id'=>$student_info['id'],'plan_id'=>$plan_id]) }}",
                type: 'POST',
                data: {'_token': '{{ csrf_token() }}'},
                success: function (data) {
                    let tr = data['html'];
                    $("table").append(tr);
                    toastr.success("添加成功!");
                }
            });
        });

        $('.del').click(function () {
            let id = $(this).data('id');
            let url = "http://admit.ma/admin/student/" + {{ $student_info['id'] }} +"/plan/destroy/" + id;
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
                        type: 'GET',
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