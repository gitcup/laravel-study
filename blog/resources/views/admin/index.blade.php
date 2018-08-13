@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">  <?= link_to('admin/create', $title = 'เพิ่มข้อมูล', ['class' => 'btn btn-primary'], $secure = null); ?></div>

        </div>
    </div>
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

                <table class="table table-striped">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>รูปภาพ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>ข้อมูลการติดต่อ</th>
                        <th>ผู้เพิ่มข้อมูล</th>
                        <th>Acitons</th>

                    </tr>
                    @foreach ($admin as $admin1)
                    <tr>
                        <td>{{ $admin1->id }}</td>
                        <td>{{ $admin1->name }}</td>
                        <td></td>
                        <td>{{ $admin1->phone_number }}</td>


                    </tr>
                    @endforeach
                </table>
                <br>
                {!! $admin->render() !!}
            </div>
        </div>
    </div>
    <br>
    <!--    พนักงานที่สามารถแก้ไขข้อมูลได้-->
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">

                <div class="card-header">พนักงานที่สามารถแก้ไขข้อมูลได้ (OfficerEdit)<div class="panel-heading">แสดงข้อมูลผู้ใช้ทั้งหมด {{ $admin->total() }} คน</div></div>

                <!--                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                
                                    You are logged in!
                                </div>-->

                <table class="table table-striped">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>รูปภาพ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>ข้อมูลการติดต่อ</th>
                        <th>ผู้เพิ่มข้อมูล</th>
                        <th>Acitons</th>

                    </tr>
                    @foreach ($admin as $admin1)
                    <tr>
                        <td>{{ $admin1->id }}</td>
                        <td>{{ $admin1->name }}</td>
                        <td></td>
                        <td>{{ $admin1->phone_number }}</td>


                    </tr>
                    @endforeach
                </table>
                <br>
                {!! $admin->render() !!}
            </div>
        </div>
    </div>
    <br>

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">

                <div class="card-header">พนักงานที่ดูได้อย่างเดียว (OfficerView)<div class="panel-heading">แสดงข้อมูลผู้ใช้ทั้งหมด {{ $admin->total() }} คน</div></div>

                <!--                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                
                                    You are logged in!
                                </div>-->

                <table class="table table-striped">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>รูปภาพ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>ข้อมูลการติดต่อ</th>
                        <th>ผู้เพิ่มข้อมูล</th>
                        <th>Acitons</th>

                    </tr>
                    @foreach ($admin as $admin1)
                    <tr>
                        <td>{{ $admin1->id }}</td>
                        <td>{{ $admin1->name }}</td>
                        <td></td>
                        <td>{{ $admin1->phone_number }}</td>


                    </tr>
                    @endforeach
                </table>
                <br>
                {!! $admin->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
