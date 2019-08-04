@extends('layout.app')
@section('title','Show Book ')
@section('content')

<div class="container mt-5">
    
   <!-- <a href="{{route('book.form.add')}}" class=" btn btn-success mb-5">Add Book</a>
    <a href="{{route('logout')}}" class=" btn btn-danger mb-5">Logout</a>

    <div class="container mb-5">
    <B>KUY : {{$user->name}}</B>
    <img src="{{$user->avatar}}" class="img-fluid rounded-circle" width="40" />
    </div> -->

    <nav class="navbar navbar-expand-lg navbar-light bg-white mb-5">
            <a class="navbar-brand" href="{{route('book.show')}}">Book Store</a>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="{{route('book.form.add')}}">Add Book</a>
                </li>
              </ul>
              <span class="navbar-brand">
                <div class="dropdown">
                    <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{$user->avatar}}" class="img-fluid rounded-circle" width="40" />
                        <B>KUY : {{$user->name}}</B>
                    </a>
                    
                        <div class="dropdown-menu px-4" aria-labelledby="dropdownMenuLink ">
                            <a class="dropdown-item px-4 text-center " href="{{route('logout')}}">Logout</a>
                        </div>
                </div>
              </span>
            </div>
    </nav>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Amount</th>
                <th scope="col">Action</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->amount}}</td>
                <td><a href="{{route('book.update',['id'=> $item->id,'action' => 'add'])}} " class=" btn btn-success"> add</a>
                    <a href="{{route('book.update',['id'=> $item->id,'action' => 'remove'])}} " class=" btn btn-danger" > remove</a>
                </td>
                <td>
                    <a href="{{route('book.toEditform',['id'=>$item->id])}}" class="btn btn-info">edit</a>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div>

@endsection