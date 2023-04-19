@extends('layouts.admin',['tbl'=>true])

@section('content')
    <div class="row mt-5">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <h4 class="w-100">
                        <a href="#" data-toggle="modal" data-target="#create" class="btn btn-primary float-left">افزودن</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter text-nowrap table-bordered border-bottom " id="tbl_1">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">عنوان</th>
                                <th class="border-bottom-0">مسیر فایل</th>
                                <th class="border-bottom-0">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if ($items)
                                    @foreach($items as $row)
                                        <tr>
                                            <td>{{$row->title}}</td>
                                            <td>{{url($row->path)}}</td>
                                            <td>
                                                <div class="d-flex">
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.file.destroy', $row->id] ]) !!}
                                                        <button class="action-btns1" data-toggle="tooltip" data-placement="top" title="حذف"
                                                         onclick="return confirm('برای حذف مطمئن هستید؟')">
                                                            <i class="feather feather-trash-2 text-danger"></i>
                                                        </button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <div class="modal" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">آپلود فایل</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    {{Form::open(array('route' => array('admin.file.store'), 'method' => 'POST','files'=>true)) }}
                        <div class="form-group">
                            {{Form::label('title', ' نام قایل ')}}
                            {{Form::text('title', null, array('class' => 'form-control','required'))}}
                        </div>
                        <div class="form-group">
                            {{Form::label('path', ' فایل ')}}
                            {{Form::file('path', null, array('class' => 'form-control','required'))}}
                        </div>
                        <div class="d-flex">
                            {{Form::submit('ارسال',array('class'=>'btn btn-primary'))}}
                            <button type="button" class="btn btn-secondary mx-3" data-dismiss="modal">انصراف</button>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

@endsection
