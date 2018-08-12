@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
<div class="panel-heading">เพิ่มข้อมูลผู้ใช้</div>

<!--//แสดงข้อความ Error-->
@if (count($errors) > 0)
<div class="alert alert-warning">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<!--//แสดงข้อความ Error-->

<div class="panel-body">
{!! Form::open(array('url' => 'books','files' => true)) !!}
<div class="col-xs-8">
<div class="form-group">
<?= Form::label('title', 'ชื่อผู้ใช้'); ?>
<?= Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'ชื่อผู้ใช้']); ?>
</div>
</div>
<div class="col-xs-8">
<div class="form-group">
<?= Form::label('email', 'อีเมล'); ?>
<?= Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'อีเมลของผู้ใช้']); ?>
</div>
    </div>
<div class="form-group">
<?= Form::label('phone_number', 'เบอร์โทรศัพท์'); ?>
<?= Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => 'เบอร์โทรศัพท์']); ?>
</div>
</div>


<div class="col-xs-4">
<div class="form-group">
{!! Form::label('image', 'รูปภาพ'); !!}
<?= Form::file('image_user', null, ['class' => 'form-control']) ?>
</div>
</div>
<div class="form-group">
<div class="col-sm-10">
<?= Form::submit('บันทึก', ['class' => 'btn btn-primary']); ?>
</div>
</div>
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection

@section('footer')
@if (session()->has('status'))
<script>
swal({
title: "<?php echo session()->get('status'); ?>",
text: "ผลการทำงาน",
timer: 2000,
type: 'success',
showConfirmButton: false
});
</script>
@endif
@endsection