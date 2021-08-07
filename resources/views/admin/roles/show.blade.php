@extends('admin_layout')
@section('title', 'Thông tin về quyền')
@section('role-active', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thông tin về quyền
            </header>
            <div class="panel-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tên quyền:</strong>
                        {{ $role->name }}
                    </div>
                </div>
                <div class="position-center">
                    <div class="row" style="padding: 15px">
                        @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                        <label style="margin: 10px 0 0 10px" class="label label-success">{{ $v->name }},</label>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@section('javascript')

@endsection