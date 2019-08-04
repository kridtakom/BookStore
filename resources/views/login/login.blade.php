@extends('layout.app')
@section('title','login ')
@section('content')


<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
        <h1>Login</h1>
            
            <form action="{{route('login')}}" method="POST">
               
                @csrf <!--ต้องมีทุกครั้งที่ต้องการใช้ form ในการโยนข้อมูลเพื่อยืนยันว่าข้อมูลที่โยนมาไม่ผิด-->
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                             <li class="alert-danger ">{{$error}}</li>
                        @endforeach
                </ul>
                @endif
                <div class="form-group">
                    <h4 class="text-secondary">User</h4>
                    <input type="text" class="form-control" name="username"  placeholder="username">
                </div>

                <div class="form-group">
                        <h4 class="text-secondary">Password</h4>
                        <input type="text" class="form-control" name="password" placeholder="password" >
                </div>
                
                <button type="submit" class="btn btn-primary">Login</button>
                <button type="submit" class="btn btn-success">Register</button>
            </form>
        </div>
    </div>

</div>
@endsection