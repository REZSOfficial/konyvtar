<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class BookController extends Controller
{
    public function index(){
        $books = Book::latest()->filter(request(['search']))->get();
        return view('index', compact('books'));
    }

    public function english(){
        $books = Book::latest()->filter(request(['search']))->get();
        foreach($books as $book){
            $tr = new GoogleTranslate('en');
            $tr->setSource('hu');
            $book->title = $tr->translate($book->title);
            $book->tags = $tr->translate($book->tags);
        }
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
        $formFields = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'pages' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $fileName);

        $book = new Book;
        $book->title = $request->input('title');
        $book->tags = $request->input('tags');
        $book->pages = $request->input('pages');
        $book->description = $request->input('description');
        $book->image = $fileName;
        $book->save();

        return redirect()->route('home')->with('message', 'Könyv sikeresen feltöltve!');

    }
}
