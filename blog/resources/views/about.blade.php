<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        @extends ('layouts.app')
        @section ('content')
       <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">เกี่ยวกับ</div>

                <div class="card-body">
                    <h1>{{$fullname}}</h1>
                    <p>ทำขึ้นเพื่อการศึกษาเท่านั้น </p>
                </div>
            </div>
        </div>
    </div>
</div>

    </body>
     @section('footer')
     <script>
     alert('hello ,about page');
     </script>
     @endsection
</html>
@endsection