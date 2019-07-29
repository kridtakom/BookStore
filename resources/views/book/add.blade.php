@extends('layout.app')
@section('title','Add ')
@section('content')


<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
        <h1>Add Book</h1>
            
            <form action="{{route('book.add')}}" method="POST"> 
                @csrf <!--ต้องมีทุกครั้งที่ต้องการใช้ form ในการโยนข้อมูลเพื่อยืนยันว่าข้อมูลที่โยนมาไม่ผิด-->
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
                
                <div class="form-group">
                   
                    <input type="text" class="form-control" name="name"  placeholder="book name ">
                   
                </div>
                <div class="form-group">
                    
                    <input type="text" class="form-control" name="price" placeholder="price">
                </div>
                <div class="form-group">
                    
                        <input type="text" class="form-control" name="amount" placeholder="amount">
                    </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('book.show')}}" type="submit" class="btn btn-warning">Show Book</a>
            </form>
        </div>
    </div>

</div>
@endsection