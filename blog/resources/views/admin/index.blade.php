@extends('layouts.app')

@section('content')
<style>
img {
  border-radius: 50%;
}
</style>
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2"> การตั้งค่าผู้ใช้</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              
             
            </div>
          </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::user()->user_type == 'admin' )
            <div class="card-header">  <?= link_to('admin/create', $title = 'เพิ่มข้อมูล', ['class' => 'btn btn-primary'], $secure = null); ?></div>
            @endif
        </div>
    </div>
    @if(Auth::user()->user_type == 'admin' )

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">

                <div class="card-header">ข้อมูลผู้ดูแลระบบ (System Administrator)</div>

                <!--                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                
                                    You are logged in!
                                </div>-->

                <table class="table ">
                    <thead class="thead-light">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>รูปภาพ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>ข้อมูลการติดต่อ</th>
                        <th>ผู้เพิ่มข้อมูล</th>
                        <th>Acitons</th>

                    </tr>
</thead>
                    @foreach ($admin as $administrator)
                    <tr>
                        <td>{{ $administrator->id }}</td>
                        <td>{{ $administrator->username }}</td>
                        <td><a href="{{ asset('images/admin/'.$administrator->image_user)}}"data-lity><img src="{{ asset('images/resize/admin/'.$administrator->image_user) }}" style="width:50px"></a></td>
                        <td>{{ $administrator->name }}&nbsp;&nbsp;{{ $administrator->lastname }}</td>
                        <td align="center" >{{ $administrator->email }}<br>{{ $administrator->phone_number}}</td>
                        <td></td>
                        <td>
                            @if(strtolower(Auth::user()->user_type) === 'admin'  )
                            <a href="{{ url('/admin/'.$administrator->id.'/edit') }}" class="btn btn-outline-warning" >แก้ไข</a>
                            
                            <?= Form::open(array('url' => 'admin/' . $administrator->id, 'method' => 'delete')) ?>
                            <button type="submit" class="btn btn-outline-danger">ลบ</button>
                            {!! Form::close() !!}
                            @endif



                        </td>



                    </tr>
                    @endforeach
                </table>
                <br>
                {!! $admin->render() !!}
            </div>
        </div>
    </div>
    <br>
    @endif  
    <!--ของแอดมิน-->

    <!--    พนักงานที่สามารถแก้ไขข้อมูลได้-->
    @if(Auth::user()->user_type == 'officer_edit' 
    or Auth::user()->user_type == 'admin'
    or Auth::user()->user_type == 'officer_view')
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">

                <div class="card-header">พนักงานที่สามารถแก้ไขข้อมูลได้ (Officer Edit)<div class="panel-heading">แสดงข้อมูลผู้ใช้ทั้งหมด {{ $admin2->total() }} คน</div></div>

                <!--                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                
                                    You are logged in!
                                </div>-->

                <table class="table " >
                    <thead class="thead-light">
                    <tr>
                        <th  >ลำดับ</th>
                        <th width="70%">ชื่อผู้ใช้</th>
                        <th>รูปภาพ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th >ข้อมูลการติดต่อ</th>
                        @if(strtolower(Auth::user()->user_type) === 'admin' or strtolower(Auth::user()->user_type) === 'officer_edit' )
                        <th >ผู้เพิ่มข้อมูล</th>
                        <th>Acitons</th>
                        </thead>
                        @endif 
                    </tr>
                    @foreach ($admin2 as $edit_admin)
                    <tr>
                        <td>{{ $edit_admin->id }}</td>
                        <td>{{ $edit_admin->username }}</td>
                        <td><a href="{{ asset('images/edit_admin/'.$edit_admin->image_user)}}"data-lity><img src="{{ asset('images/resize/admin/'.$edit_admin->image_user) }}" style="width:50px"></a></td>
                        <td>{{ $edit_admin->name }}&nbsp;&nbsp;{{ $edit_admin->lastname }}</td>
                        <td align="center" >{{ $edit_admin->email }}<br>{{ $edit_admin->phone_number}}</td>
                        <td></td>
                        @if(strtolower(Auth::user()->user_type) === 'officer_edit' or (Auth::user()->user_type) === 'admin' )
                        <td>

                            <a href="{{ url('/admin/'.$edit_admin->id.'/edit') }}" class="btn btn-outline-warning" >แก้ไข</a>

                            @endif

                            @if(strtolower (Auth::user()->user_type) === 'admin' )
                            <?= Form::open(array('url' => 'admin/' . $edit_admin->id, 'method' => 'delete')) ?>
                            <button type="submit" class="btn btn-outline-danger">ลบ</button>
                            {!! Form::close() !!}
                            @endif

                        </td>



                    </tr>
                    @endforeach
                </table>
                <br>
                {!! $admin2->render() !!}
            </div>
        </div>
    </div>

    @endif 
    <!-- ของแอดมินที่แก้ไขได้--> 
    <br>
    <!--    พนักงานที่ดูได้อย่างเดียว -->
    @if(Auth::user()->user_type == 'officer_edit'  
    or Auth::user()->user_type == 'admin'
    or Auth::user()->user_type == 'officer_view')
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">

                <div class="card-header">พนักงานที่ดูได้อย่างเดียว (Officer View)<div class="panel-heading">แสดงข้อมูลผู้ใช้ทั้งหมด {{ $admin3->total() }} คน</div></div>

                <!--                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                
                                    You are logged in!
                                </div>-->

                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>รูปภาพ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>ข้อมูลการติดต่อ</th>
                        @if(strtolower(Auth::user()->user_type) === 'admin' or strtolower(Auth::user()->user_type) === 'officer_edit' )
                        <th>ผู้เพิ่มข้อมูล</th>
                        <th>Acitons</th>
                        </thead>
                        @endif 
                    </tr>
                    @foreach ($admin3 as $officer_view)
                    <tr>
                        <td>{{ $officer_view->id }}</td>
                        <td>{{ $officer_view->username }}</td>
                        <td><a href="{{ asset('images/admin/'.$officer_view->image_user)}}"data-lity><img src="{{ asset('images/resize/admin/'.$officer_view->image_user) }}" style="width:50px"></a></td>
                        <td>{{ $officer_view->name }}&nbsp;&nbsp;{{ $officer_view->lastname }}</td>
                        <td align="center" >{{ $officer_view->email }}<br>{{ $officer_view->phone_number}}</td>
                        @if(strtolower(Auth::user()->user_type) === 'officer_edit' or  (Auth::user()->user_type) === 'admin' )
                        <td></td>
                        <td>

                            <a href="{{ url('/admin/'.$officer_view->id.'/edit')  }}" class="btn btn-outline-warning" >แก้ไข</a>
                            <?= Form::open(array('url' => 'admin/' . $officer_view->id, 'method' => 'delete')) ?>

                            {!! Form::close() !!}
                            @endif
                            @if(strtolower(Auth::user()->user_type) === 'admin'   )

                            <?= Form::open(array('url' => 'admin/' . $officer_view->id, 'method' => 'delete')) ?>
                            <button type="submit" class="btn btn-outline-danger">ลบ</button>
                            {!! Form::close() !!}
                            @endif
                        </td>


                    </tr>
                    @endforeach



                    @endif 
                    <!-- ของแอดมินที่ดูได้อย่างเดียว-->    
                </table>
                <br>
                {!! $admin3->render() !!}
            </div>
        </div>
    </div>
</div>

@endsection
