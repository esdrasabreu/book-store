<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return response()->json($books, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Name' => 'required',
            'ISBN' => 'required|digits:13',
            'Value' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    public function show(string $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }
        return response()->json($book, 200);
    }

    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'Name' => 'required',
            'ISBN' => 'required|digits:13',
            'Value' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $book->update($request->all());
        return response()->json($book, 200);
    }

    public function destroy(string $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }
        $book->delete();
        return response()->json(['message' => 'Book deleted successfully'], 200);
    }

    public function searchByName(Request $request, string $name)
    {
        $books = Book::where('name', 'LIKE', "%{$name}%")->get();

        if ($books->isEmpty()) {
            return response()->json(['error' => 'No books found with the given name'], 404);
        }

        return response()->json($books, 200);
    }

    public function searchByValueRange(Request $request, float $minValue, float $maxValue)
    {
    $books = Book::whereBetween('value', [$minValue, $maxValue])->get();

    if ($books->isEmpty()) {
        return response()->json(['error' => 'No books found within the given value range'], 404);
    }

    return response()->json($books, 200);
    }

    public function searchByISBN(Request $request, string $isbn)
    {
        $books = Book::where('ISBN', $isbn)->get();

        if ($books->isEmpty()) {
            return response()->json(['error' => 'No books found with the given ISBN'], 404);
        }

        return response()->json($books, 200);
    }
}
