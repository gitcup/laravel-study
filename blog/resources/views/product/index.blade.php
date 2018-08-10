@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
    <?= link_to('product/create', $title = 'เพิ่มข้อมูล', ['class' => 'btn btn-primary'], $secure = null); ?>

<hr>
<div class="panel panel-default">
<div class="panel-heading">แสดงข้อมูลสินค้า จำนวนทั้งหมด {{ $product->total() }} ชิ้น</div>
<div class="panel-body">
    
<table class="table table-striped">
    <tr>
<th>รหัส</th>
<th>ชื่อสินค้า</th>
<th>ราคา</th>
<th>หมวดหมู่สินค้า</th>
<th>รูปภาพ</th>
<th>แก้ไข</th>
<th>ลบ</th>
</tr>
@foreach ($product as $product2)
<tr>
<td>{{ $product2->id }}</td>
<td>{{ $product2->title }}</td>
<td>{{ number_format($product2->price,2) }}</td>
<td>{{ $product2->typeproduct->name }}</td>
<td>
<a href="{{ asset('images/'.$product2->image)}}"data-lity><img src="{{ asset('images/resize/'.$product2->image) }}" style="width:100px"></a>
</td>
<td>
<a href="{{ url('/product/'.$product2->id.'/edit') }}">แก้ไข</a>
</td>


<td>
<?= Form::open(array('url' => 'product/' . $product2->id, 'method' => 'delete')) ?>
<button type="submit" class="btn">ลบ</button>
{!! Form::close() !!}
</td>
</tr>
@endforeach
</table>
<br>
{!! $product->render() !!}
</div>
</div>
</div>
</div>
</div>
@endsection