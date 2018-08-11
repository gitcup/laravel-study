@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
<div class="panel-heading">แก้ไขข้อมูลสินค้า {{ $product->title }}</div>
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
<?= Form::model($product, array('url' => 'product/' . $product->id, 'method' => 'put')) ?>
<div class="col-xs-8">
    
    
<div class="form-group">
<?= Form::label('title', 'ชื่อสินค้า'); ?>
<?= Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'ชื่อสินค้า']); ?>
</div>
</div>
<div class="col-xs-4">
<div class="form-group">
{!! Form::label('price', 'ราคา'); !!}
{!! Form::text('price',null,['class' => 'form-control','placeholder' => 'เช่น 100, 100.25']); !!}
</div>
</div>
<div class="col-xs-4">
<div class="form-group">
{!! Form::label('typeproduct_id', 'ประเภทสินค้า'); !!}
<?= Form::select('typeproduct_id', App\TypeProduct::all()->pluck('name', 'id'), null, ['class' => 'formcontrol',
'placeholder' => 'กรุณาเลือกประเภทสินค้า...']); ?>
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