@extends('layouts.app')

@section('content')
    <div class="breadcrumbs" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home fa fa-home fa-lg"></i>
                <a href="/">首页</a>
            </li>
            <li class="active">管理员用户</li>
        </ul><!-- .breadcrumb -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                首页
                <small>
                    <i class="icon-double-angle-right fa fa-angle-double-right fa-lg"></i>
                    管理员用户
                </small>
            </h1>
        </div><!-- /.page-header -->
        <div class="row">
            <div class="col-sm-6">
                {{ Form::open(['url'=>'company/userlist','method'=>'get']) }}
                <label>关键字查询(公司/联系人/手机/邮箱): {{ Form::text('keyword',$keyword) }}</label>
                {{ Form::close()}}
            </div>
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <colgroup>
                                <col width="10%">
                                <col width="10%">
                                <col width="10%">
                                <col width="10%">
                                <col width="10%">
                                <col width="10%">
                                <col width="10%">
                                <col width="10%">
                                <col width="10%">
                                <col width="10%">
                            </colgroup>
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <colgroup
                                <thead>
                                <tr>
                                    <th>姓名</th>
                                    <th>账号</th>
                                    <th>公司编号</th>
                                    <th>公司名称</th>
                                    <th>手机</th>
                                    <th>电话</th>
                                    <th>邮箱</th>
                                    <th class="center">注册时间</th>
                                    <th class="center">最后登录</th>
                                    <th class="center">最后操作</th>
                                    <th class="center">操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $c)
                                    <tr>
                                        <td>
                                            <a href="#">{{$c->real_name}}</a>
                                        </td>
                                        <td>{{$c->user_name}}</td>
                                        <td>{{$c->company_code}}</td>
                                        <td>{{$c->company_name}}</td>
                                        <td>{{$c->mobile}}</td>
                                        <td>{{$c->tel}}</td>
                                        <td>{{$c->email}}</td>
                                        <td class="center">{{$c->created}}</td>
                                        <td class="center"><a href="/log/userlogin/{{$c->id}}">{{$c->logintime}}</a> </td>
                                        <td class="center"><a href="/log/useraction/{{$c->id}}">{{$c->actiontime}}</a> </td>
                                        <td class="center">
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <button class="btn btn-xs btn-info">
                                                    <i class="icon-edit fa fa-edit fa-lg bigger-120"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-sm-6">
                                <div class="dataTables_info">一共{{$users->total()}}条记录,当前第{{$users->currentPage()}}
                                    页
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="dataTables_paginate">{!! $users->appends(['keyword' => $keyword])->links() !!}</div>
                            </div>
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->
                </div><!-- /row -->
            </div><!-- /.col -->
        </div><!-- /.row -->

    </div><!-- /.page-content -->
@endsection