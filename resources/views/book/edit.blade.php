@extends('layout.app')
@section('title','Edit ')
@section('content')


<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
        <h1>Edit Book</h1>
            
            <form action="{{route('book.edit',['id'=>$books->id])}}" method="POST">
               <!-- ในการส่ง query string ผ่าน form ต้องส่งเป็น array เสมอ-->
                @csrf <!--ต้องมีทุกครั้งที่ต้องการใช้ form ในการโยนข้อมูลเพื่อยืนยันว่าข้อมูลที่โยนมาไม่ผิด-->
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
                
                <div class="form-group">
                   
                <input type="text" class="form-control" name="name"   value="{{$books->name}}">
                   
                </div>
                <div class="form-group">
                    
                    <input type="text" class="form-control" name="price"  value="{{$books->price}}">
                </div>
                <div class="form-group">
                    
                        <input type="text" class="form-control" name="amount"  value="{{$books->amount}}">
                    </div>
                
                <button type="submit" class="btn btn-primary">Submit Edit</button>
            </form>
        </div>
    </div>

</div>
@endsection