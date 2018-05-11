@extends('layouts.layout')
@section('content')
    <div class="page-header">
        <h1 class="page-title"><i class="icon wb-home"></i>@lang('college.college_list')</h1>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="card-block ">
                <div class="project-controls clearfix">
                    <div class="float-left">
                        <a href="{{ route('admin.college.create') }}" class="btn btn-outline btn-primary">@lang('college.create_college')</a>
                    </div>
                    <div class="float-right">
                        <form action="">
                            <div class="form-group mb--1">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="key" value="{{ $key or '' }}" placeholder="@lang('college.search_tips')">
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
                                <th>@lang('form.id')</th>
                                <th>@lang('college.college_name')</th>
                                <th>@lang('college.province_id')</th>
                                <th>@lang('college.category_id')</th>
                                <th>@lang('form.created_at')</th>
                                <th>@lang('form.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($college_list))
                                @foreach($college_list as $college)
                                    <tr align="center">
                                        <td>{{ $college['id'] or ''}}</td>
                                        <td>{{ $college['college_name'] or ''}}</td>
                                        <td>{{ $college['province']['name'] or '未填写'}}</td>
                                        <td>{{ $college['CollegeCategory']['category_name'] or '未填写'}}</td>
                                        <td class="hidden-sm-down">{{ $college['created_at']  }}</td>
                                        <td>
                                            <a href="{{route('admin.college.show',['id'=>$college['id']])}}" class="btn btn-outline btn-success btn-xs"><i class="icon wb-eye" aria-hidden="true"></i></a>
                                            <a href="{{route('admin.college.edit',['id'=>$college['id']])}}" class="btn btn-outline btn-primary btn-xs"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                                            <a href="{{route('admin.college.destroy',['id'=>$college['id']])}}" class="btn btn-outline btn-warning btn-xs"><i class="icon wb-trash" aria-hidden="true"></i></a>
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
                        </div>
                        <div class="float-right">
                            <nav>
                                @if(isset($key))
                                    {!! $college_list->appends(['key'=>$key])->render() !!}
                                @else
                                    {{ $college_list->links() }}
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