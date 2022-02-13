<?php

namespace Tests\Feature;

use App\Author;
use App\Book;
use App\Publisher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{

    /**
     * Create book
     *
     * @test
     * @return void
     */
    public function create_new_book()
    {
        $author = $this->create_author();
        $publisher = $this->create_publisher();
        $data = [
            'title' => "book one",
            'author_id' => $author->id,
            'publisher_id' => $publisher->id,
        ];
        $response = $this->post("/api/public/book",$data,[
            'authorization' => env('API_KEY')
        ]);

        $response->assertStatus(201);
    }

    /**
     * Update book
     *
     * @test
     * @return void
     */
    public function update_book()
    {
        $book = $this->create_book();
        $author = $this->create_author();
        $publisher = $this->create_publisher();
        $data = [
            'title' => "book title update",
            'author_id' => $author->id,
            'publisher_id' => $publisher->id,
        ];
        $response = $this->put("/api/public/book/{$book->id}",$data,[
            'authorization' => env('API_KEY')
        ]);

        $response->assertStatus(200);
    }

    /**
     * Get books
     *
     * @test
     * @return void
     */
    public function get_books()
    {
        $response = $this->get('/api/public/book',[
            'authorization' => env('API_KEY')
        ]);

        $response->assertStatus(200);
    }

    /**
     * Get book
     *
     * @test
     * @return void
     */
    public function get_book()
    {
        $book = $this->create_book();
        $response = $this->get("/api/public/book/{$book->id}",[
            'authorization' => env('API_KEY')
        ]);
        $response->assertStatus(200);
    }

    /**
     * Delete book
     *
     * @test
     * @return void
     */
    public function delete_book()
    {
        $book = $this->create_book();
        $response = $this->delete("/api/public/book/{$book->id}",[
            'authorization' => env('API_KEY')
        ]);
        $response->assertStatus(200);
    }


}
