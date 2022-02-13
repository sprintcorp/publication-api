## Project Overview

This solution is build using laravel 7. The application allows user's with app key create books, author and publishers. .



## Project setup


- Clone the project from repository using the `https://github.com/sprintcorp/publication-api.git` into a directory on your pc
- Move to project directory `cd publication-api` 
- Run `composer install` to install all packages.
- When the above step has been done you the proceed to create database, the database use during development is mysql database and Eloquent ORM is used to interact with the database,
- Create a .env file the copy .env.example to create enviroment variable for this application which houses simple configuration text file that is used to define some variables passed into the application's environment,
- Generate app key which is needed for the application to function properly used for all encrypted data, like sessions,Password, remember token using `php artisan key:generate`.
- Run `php artisan migrate` which creates table in the database specified application .env file.
- Run `php artisan db:seed` to seed data into the database
- Run using `php artisan serve` which starts the application using laravel default port 8000 to run it on the system locally.
- Add `authorization` as header key and `my_app_test` as value ` 'authorization' => env('API_KEY')` or replace the value of `API_KEY` in .env file then use it as authorize the api

## Usage

- Get all books `localhost:8000/api/public/book` method `GET` 
#### Response

    {
        "current_page": 1,
        "data": [
            {
                "book_id": 2,
                "book_title": "Book one",
                "book_authors": [
                    {
                        "author_id": 3,
                        "author_name": "Djed spence"
                    }
                ],
                "book_publishers": [
                    {
                        "publisher_id": 1,
                        "publisher_name": "A.J Wilson"
                    },
                    {
                        "publisher_id": 2,
                        "publisher_name": "Peak Ville"
                    }
                ]
            },
            {
                "book_id": 3,
                "book_title": "Book four",
                "book_authors": [
                    {
                        "author_id": 1,
                        "author_name": "Billy jean"
                    },
                    {
                        "author_id": 2,
                        "author_name": "John doe"
                    }
                ],
                "book_publishers": [
                    {
                        "publisher_id": 1,
                        "publisher_name": "A.J Wilson"
                    },
                    {
                        "publisher_id": 2,
                        "publisher_name": "Peak Ville"
                    }
                ]
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/public/book?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/public/book?page=1",
        "next_page_url": null,
        "path": "http://127.0.0.1:8000/api/public/book",
        "per_page": 10,
        "prev_page_url": null,
        "to": 2,
        "total": 2
    }


- Get book `localhost:8000/api/public/book/{id}` method `GET` where `id` is book id 
#### Response

    {
        "book_id": 2,
        "book_title": "Book one",
        "book_authors": [
            {
                "author_id": 3,
                "author_name": "Djed spence"
            }
        ],
        "book_publishers": [
            {
                "publisher_id": 1,
                "publisher_name": "A.J Wilson"
            },
            {
                "publisher_id": 2,
                "publisher_name": "Peak Ville"
            }
        ]
    }
    
    
- Create book `localhost:8000/api/public/book` method `POST`

#### Data
    {
        "title":"book three",
        "author_id":[2,3],
        "publisher_id":[2,3]
    }

- Where `autho_id` takes array of author id and `publisher_id` takes array of publisher id

#### Response

    {
        "title": "book three",
        "updated_at": "2022-02-13T22:13:34.000000Z",
        "created_at": "2022-02-13T22:13:34.000000Z",
        "id": 4
    }
    
    
 - Update book `localhost:8000/api/public/book/{id}` method `PUT` where `id` is book id 

#### Data
    {
        "title":"book three",
        "author_id":[2,3],
        "publisher_id":[2,3]
    }

- Where `autho_id` takes array of author id and `publisher_id` takes array of publisher id
#### Response

    {
        "book_id": 2,
        "book_title": "Book one",
        "book_authors": [
            {
                "author_id": 3,
                "author_name": "Djed spence"
            }
        ],
        "book_publishers": [
            {
                "publisher_id": 1,
                "publisher_name": "A.J Wilson"
            },
            {
                "publisher_id": 2,
                "publisher_name": "Peak Ville"
            }
        ]
    }
    
   - Delete book `localhost:8000/api/public/book/{id}` method `DELETE` where `id` is book id
        
   #### Response

    {
        "data": "book deleted successfully"
    }
