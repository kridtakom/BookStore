@extends('layout.app')
@section('title','login ')
@section('content')


<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
        <h1>Register</h1>
            
            <form action="{{route('register')}}" method="POST">
               
                @csrf <!--ต้องมีทุกครั้งที่ต้องการใช้ form ในการโยนข้อมูลเพื่อยืนยันว่าข้อมูลที่โยนมาไม่ผิด-->
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                             <li class="alert-danger ">{{$error}}</li>
                        @endforeach
                </ul>
                @endif
                <div class="form-group">
                    <b class="text-secondary">User</b>
                    <input type="text" class="form-control" name="username"  placeholder="username">
                </div>

                <div class="form-group">
                    <b class="text-secondary">Full Name</b>
                    <input type="text" class="form-control" name="fullname" placeholder="name" >
                </div>

                <div class="form-group">
                        <b class="text-secondary">Password</b>
                        <input type="text" class="form-control" name="password" placeholder="password" >
                </div>
                
                
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>

</div>
@endsection