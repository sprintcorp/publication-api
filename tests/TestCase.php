<?php

namespace Tests;

use App\Author;
use App\Book;
use App\Publisher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected function create_author(){
        return factory(Author::class)->create();
    }

    protected function create_publisher(){
        return factory(Publisher::class)->create();
    }

    protected function create_book(){
        return factory(Book::class)->create();
    }
}
