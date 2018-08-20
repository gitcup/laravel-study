@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
<div class="panel-heading">แก้ไขข้อมูลผู้ใช้  {{ $admin->username }}</div>
<br>
<div class="panel-body">
@if (count($errors) > 0)
<div class="alert alert-warning">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<?= Form::model($admin, array('url' => 'admin/' . $admin->id, 'method' => 'put')) ?>
<div class="col-xs-8">
<div class="form-group">
<?= Form::label('username', 'ชื่อผู้ใช้'); ?>
<?= Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'ชื่อผู้ใช้']); ?>
</div>
    <div class="form-group">
<?= Form::label('password', 'รหัสผ่าน'); ?>
<?= Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'กรุณากรอกรหัสผ่านใหม่']); ?>
</div>
    <div class="form-group">
<?= Form::label('name', 'ชื่อจริง'); ?>
<?= Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ชื่อจริง']); ?>
</div>
     <div class="form-group">
<?= Form::label('lastname', 'นามสกุล'); ?>
<?= Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'นามสกุล']); ?>
</div>
     <div class="form-group">
<?= Form::label('email', 'อีเมล'); ?>
<?= Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'นามสกุล']); ?>
</div>
    <div class="form-group">
<?= Form::label('phone_number', 'เบอร์โทรศัพท์'); ?>
<?= Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => 'เบอร์โทรศัพท์']); ?>
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