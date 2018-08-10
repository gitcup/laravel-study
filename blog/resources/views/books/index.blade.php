@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
    <?= link_to('books/create', $title = 'เพิ่มข้อมูล', ['class' => 'btn btn-primary'], $secure = null); ?>

<hr>
<div class="panel panel-default">
<div class="panel-heading">แสดงข้อมูลหนังสือ จำนวนทั้งหมด {{ $books->total() }} เล่ม</div>
<div class="panel-body">
    
<table class="table table-striped">
    <tr>
<th>รหัส</th>
<th>ชื่อหนังสือ</th>
<th>ราคา</th>
<th>หมวดหนังสือ</th>
<th>รูปภาพ</th>
<th>แก้ไข</th>
<th>ลบ</th>
</tr>
@foreach ($books as $book)
<tr>
<td>{{ $book->id }}</td>
<td>{{ $book->title }}</td>
<td>{{ number_format($book->price,2) }}</td>
<td>{{ $book->typebooks->name }}</td>
<td>
<a href="{{ url('/books/'.$book->id.'/edit') }}">แก้ไข</a>
</td>
<td>
<?= Form::open(array('url' => 'books/' . $book->id, 'method' => 'delete')) ?>
<button type="submit" class="btn">ลบ</button>
{!! Form::close() !!}
</td>
<td>
<a href="{{ asset('images/'.$book->image)}}"data-lity><img src="{{ asset('images/resize/'.$book->image) }}" style="width:100px"></a>
</td>
</tr>
@endforeach
</table>
<br>
{!! $books->render() !!}
</div>
</div>
</div>
</div>
</div>
@endsection