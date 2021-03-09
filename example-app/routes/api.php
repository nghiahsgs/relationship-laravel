<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Author;
use App\Phone;
use App\Book;
use App\Role;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get("/create_author",function(){
    // Author::create([
        
    //         'age'=>20,
    //         'name'=>"nghia",
    //         'city'=>"HN",
            
    // ]);

    $now = Carbon::now('utc')->toDateTimeString();
    Author::insert([
        [
            'age'=>20,
            'name'=>"nghia",
            'city'=>"HN",
            'created_at'=> $now,
            'updated_at'=> $now
        ],
        [
            'age'=>21,
            'name'=>"nghia2",
            'city'=>"HCM",
            'created_at'=> $now,
            'updated_at'=> $now
        ],
        [
            'age'=>22,
            'name'=>"nghia3",
            'city'=>"DN",
            'created_at'=> $now,
            'updated_at'=> $now
        ],
    ]);
});

Route::get("/create_phone",function(){
    $author = Author::get()[0];
    Phone::create([
        'phone'=>'0982149607',
        'author_id'=>$author->id
    ]);

});

Route::get("/create_book",function(){
    $author = Author::get()[0];
    $now = Carbon::now('utc')->toDateTimeString();
    Book::insert(
        [
            [
                'name'=>'cuon theo chieu gio',
                'price'=>100,
                'author_id'=>$author->id,
                'created_at'=> $now,
                'updated_at'=> $now
            ],
            [
                'name'=>'con chut gi de nho',
                'price'=>200,
                'author_id'=>$author->id,
                'created_at'=> $now,
                'updated_at'=> $now
            ]
        ]
    );
});

Route::get("/create_role",function(){
    $now = Carbon::now('utc')->toDateTimeString();
    Role::insert(
        [
            [
                'name'=>'normal admin',
                'created_at'=> $now,
                'updated_at'=> $now
            ],
            [
                'name'=>'admin',
                'created_at'=> $now,
                'updated_at'=> $now
            ],
            [
                'name'=>'super_admin',
                'created_at'=> $now,
                'updated_at'=> $now
            ]
        ]
    );
});

Route::get("/test_author_to_phone",function(){
    $author = Author::get()[0];
    // return $author->phone()->get();
    return $author->phone;
});
Route::get("/test_author_to_book",function(){
    $author = Author::get()[0];
    // return $author->books;
    return $author->books()->where(
        
            'price','>','100'
        
    )->get();
});

Route::get("/test_author_to_book_2",function(){
    $book = Book::get()[0];
    // return $book->author->name;    
    return $book->author;    
});

Route::get("/test_author_to_role",function(){
    $author = Author::get()[0];
    // return $author;
    return $author->roles;    
});

Route::get("/test_author_to_role_2",function(){
    $role = Role::get()[2];
    // return $role;
    return $role->authors; 
});