<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('index', compact('books'));
    }

    public function info(Book $book){
        return view('books.info', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'pages' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $storedLogo = $logo->store('logos', 'public');
            $formFields['logo'] = $storedLogo;
        }
        
        $book->update($formFields);

        return redirect()->back()->with('status','Book Updated Successfully'); 
    }

    public function delete(Book $book){
        $book->delete();
        return redirect()->back()->with('status','Book Deleted Successfully'); 
    }

    public function create(){
        return view('books.create'); 
    }

    public function save(Request $request){
        dd($request);
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'pages' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $storedLogo = $logo->store('logos', 'public');
            $formFields['logo'] = $storedLogo;
        }
        
        Book::create($formFields);

        return response()->json(['message' => 'Sikeres frissítés']);
    }
}
