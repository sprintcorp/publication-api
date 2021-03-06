<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;

class BookController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with(['authors','publishers'])->get();
        return $this->showAll(BookResource::collection($books),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $book = Book::create(['title'=> $request->title]);
        $book->authors()->attach($request->author_id);
        $book->publishers()->attach($request->publisher_id);
        return $this->showOne($book,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::with(['authors','publishers'])->findorFail($id);
        return $this->showOne(new BookResource($book),200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $book = Book::findorFail($id);
        if($request->has('author_id')){
            $book->authors()->sync($request->author_id);
        }
        if($request->has('publisher_id')){
            $book->publishers()->sync($request->publisher_id);
        }
        return $this->showOne(new BookResource($book),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::findorFail($id)->delete();
        return $this->showMessage('book deleted successfully',200);
    }
}
