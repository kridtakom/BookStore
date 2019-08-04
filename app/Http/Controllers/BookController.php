<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BookStore; //ทำให้เราเรียกเพื่อมาทำอะไรเกี่ยวกับ DB ได้
use Validator;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $book = BookStore::all();
        $data = ['books' => $book, 
                 'user' => Auth::user()
                ];
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
        ], [
            'name.required' => 'name is required',
            'price.required' => 'price is required',
            'amount.required' => 'amount is required',
            'price.numeric' => 'price is number only',
            'amount.numeric' => 'amount is number only',
        ]); //เป็นการ custom error message
        //เป็นขั้นตอนการกำหนดเงื่อนไข

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        //BookStore::create($validator->validate()); //เป็น add ข้อมูลใหม่ลง table

        $book = new BookStore;
        $book->name = $request->name;
        $book->price = $request->price;
        $book->amount = $request->amount;
        //วิธีนี้ไว้สำหรับชื่อจาก request มาไม่ตรงกับชื่อใน column DB

        $book->save();

        return redirect()->back();
    }

    public function updateBook(Request $request, $id, $action)
    {
        $book = BookStore::find($id);

        if ($action == "add") {
            $book->amount =  $book->amount + 1;
        } else if ($book->amount > 0) {
            $book->amount =  $book->amount - 1;
        }

        $book->save(); //เป็นการ save transaction
        return redirect()->back();
    }

    public function editForm($id)
    {
        $book = BookStore::find($id);
        $data['books'] = $book;
        return view('book.edit', $data);
    }

    public function editBook(Request $request, $id)
    {
        $oldBook = BookStore::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $oldBook->fill($validator->validate()); //ไว้สำหรับการแก้ไขโดยการนำ array มา return เก็บใน oldbook เพราะว่า $validator->validate() return ออกมาเป็น array
        $oldBook->save();

        //$allBook = BookStore::all();
        $data = ['books' => BookStore::all(), 
                 'user' => Auth::user()
                ];
        return redirect()->route('book.show', $data); // parameter 2 ต้องส่งเป็น  array only
    }
}
