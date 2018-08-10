@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
<div class="panel-heading">แสดงข้อมูลประเภทสินค้า [ทั้งหมด {{ $count }} รายการ]</div>
<div class="panel-body">
<table class="table table-striped">
<tr>
<th>รหัส</th>
<th>ประเภทสินค้า</th>
<th>เครื่องมือ</th>
</tr>
@foreach ($typeproducts as $typeproduct)
<tr>
<td>{{ $typeproduct->id }}</td>
<td>{{ $typeproduct->name }}</td>
<td><a href="{{ url('/typeproducts/destroy/'.$typeproduct->id) }}">ลบ</a></td>
</tr>
@endforeach
</table>
    {!! $typeproducts->render() !!}
</div>
</div>
</div>
    </div>
</div>
@endsection