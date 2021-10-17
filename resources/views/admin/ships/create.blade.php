@extends('admin_layout')
@section('title', 'Phí vận chuyển')
@section('ship-active', 'active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm phí vận chuyển
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form method="post" role="form">
                        @csrf

                        <div class="form-group">
                            <label for="">Chọn thành phố</label>
                            <select id="city" name="city" class="form-control input-sm m-bot15 choose city">
                                <option value="">--Chọn tỉnh/thành phố--</option>
                                @foreach($cities as $c)
                                <option value="{{$c->matp}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn quận huyện</label>
                            <select id="province" name="province" class="form-control input-sm m-bot15 choose province">
                                <option value="">--Chọn quận huyện--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn xã phường</label>
                            <select id="ward" name="ward" class="form-control input-sm m-bot15 ward">
                                <option value="">--Chọn xã phường--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Phí vận chuyển</label>
                            <input value="" type="number" name="fee" class="form-control fee">

                        </div>
                        <a href="{{route('admin.ships.index')}}" class="btn btn-primary">Quay lại</a>
                        <button type="button" class="btn btn-info add-ship">Thêm mới</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<div style="background-color: white;;" class="panel-body">
    <div id="load_ship" class="col-lg-12">

    </div>
</div>
@endsection
@section('javascript')
<script>
$(document).ready(function() {
    load_ship();

    function load_ship() {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{route('admin.ships.index')}}",
            method: 'POST',
            data: {
                _token: _token,
            },
            success: function(data) {
                $('#load_ship').html(data)
            },
        });
    }
    $(document).on('blur', '.fee-ship', function(){
        var fee_id = $(this).data('fee_id');
        var fee_value = $(this).text();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{route('admin.ships.update')}}",
            method: 'POST',
            data: {
                fee_id:fee_id,
                fee_value:fee_value,
                _token:_token,
            },
            success: function(data) {
                load_ship();
            },
        });
    })
    $('.add-ship').click(function() {
        var city = $('.city').val();
        var province = $('.province').val();
        var ward = $('.ward').val();
        var fee = $('.fee').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{route('admin.ships.update')}}",
            method: 'POST',
            data: {
                'matp': city,
                'maqh': province,
                'xaid': ward,
                'fee': fee,
                _token: _token,
            },
            success: function(data) {
                
            },
        });
        load_ship();
    })
    $('.choose').on('change', function() {
        var action = $(this).attr('id');
        var ma_id = $(this).val();
        var _token = $('input[name="_token"]').val();
        var result = '';
        if (action == 'city') {
            result = 'province';
        } else {
            result = 'ward';
        }
        $.ajax({
            url: "{{route('admin.ships.store')}}",
            method: 'POST',
            data: {
                action: action,
                _token: _token,
                ma_id: ma_id,
            },
            success: function(data) {
                $('#' + result).html(data);

            }

        });
    })
})
</script>
@endsection