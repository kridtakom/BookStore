@extends('layout.app')
@section('title','Show Book ')
@section('content')

<div class="container mt-5">
    <a href="{{route('book.form.add')}}" class=" btn btn-success mb-5">Add Book</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Amount</th>
                <th scope="col">Action</th>
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
            </tr>
           @endforeach
        </tbody>
    </table>
</div>

@endsection