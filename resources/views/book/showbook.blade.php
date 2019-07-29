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
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->amount}}</td>
            </tr>
           @endforeach
        </tbody>
    </table>
</div>

@endsection