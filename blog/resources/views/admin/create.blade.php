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
{!! Form::open(array('url' => 'admin','files' => true)) !!}
<div class="col-xs-8">
    <div class="col-sm-3">
<?= Form::label('username', 'ชื่อผู้ใช้งาน'); ?>
<?= Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'กรุณากรอกชื่อผู้ใช้งาน']); ?>
</div>
    
<div class="col-sm-4">
<?= Form::label('name', 'ชื่อจริง'); ?>
<?= Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'กรุณากรอกชื่อจริง']); ?>
    
</div>
    
    <div class="col-sm-4">
<?= Form::label('lastname', 'นามสกุล'); ?>
<?= Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'กรุณากรอกนามสกุล']); ?>
</div>
        </span>
    <div class="col-sm-4">
<?= Form::label('email', 'อีเมล'); ?>
<?= Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'กรุณากรอกอีเมล']); ?>
</div>
     <div class="col-sm-4">
<?= Form::label('password', 'รหัสผ่าน'); ?>
<?= Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'กรุณากรอกรหัสผ่าน']); ?>
</div>
     <div class="col-sm-4 ">
<?= Form::label('phone_number', 'เบอร์โทรศัพท์'); ?>
<?= Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => 'กรุณากรอกเบอร์โทรศัพท์']); ?>
</div>


        <br>
<div class="col-xs-4">
<div class="form-group">
{!! Form::label('image_user', 'รูปภาพ'); !!}
<?= Form::file('image_user', null, ['class' => 'form-control']) ?>
</div>
</div>
        <div class="col-xs-4">
            <div class="form-group">
                {!! Form::label('user_type', 'สถานะ'); !!}
       <?=  Form::select('user_type', ['admin' => 'แอดมิน', 'officer_edit' => 'พนักงานแก้ไข' , 'officer_view' => 'พนักงานที่ดูได้อย่างเดียว']);?>
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