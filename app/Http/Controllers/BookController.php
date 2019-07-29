<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BookStore; //ทำให้เราเรียกเพื่อมาทำอะไรเกี่ยวกับ DB ได้

use Validator;

class BookController extends Controller
{
    public function index()
    {
        $book = BookStore::all();
        $data['books'] = $book;
        return view('book.showbook', $data);
    }

    public function addForm()
    {
        return view('book\add');
    }
    public function addBook(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'amount' => 'required|numeric',

        ], []);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }


        BookStore::create($validator->validate());
        return redirect()->back();
    }

    public function updateBook(Request $request, $id , $action)
    {
        $book = BookStore::find($id);

        if($action == "add"){
           $book->amount =  $book->amount + 1; 
        } else if($book->amount > 0){
            $book->amount =  $book->amount - 1; 
        }
        
        $book -> save(); //เป็นการ save transaction
        return redirect()->back();
    }
}
