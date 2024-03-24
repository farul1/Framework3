<?php

use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('staf', [
        "title" => "staf"
    ]);
});

Route::get('/blog', function () {
    $blog_blog = [
        [
            "title" => "Praktikum",
            "author" => "Syafarul Priwantoro",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis odit libero similique distinctio itaque commodi quaerat non, neque deleniti voluptatem architecto tempora doloremque fugit incidunt nostrum? Incidunt, fugit officiis provident porro pariatur corrupti soluta maiores consectetur nihil delectus eligendi voluptatem? Soluta ipsam saepe temporibus dolore est error aperiam itaque perferendis ex quo neque provident enim facere doloremque, pariatur nisi cum consequuntur voluptatum voluptates? Soluta repellat odit officiis sequi ullam unde, illum dolorum ipsum adipisci eaque optio harum exercitationem voluptas voluptatem debitis veniam vel magnam inventore tenetur fugit placeat mollitia? Assumenda corrupti omnis necessitatibus dolore nostrum pariatur perferendis veritatis dolorem aut!"
        ],
    ];
    return view('blog',[
        "title" => "Blog",
        "image" => "contoh1.jpg",
        "blog" => $blog_blog
    ]);
});


Route::get('/cloning', function () {
    return view('cloning', [
        "image" => "contoh1.jpg",
        "title" => "staf"
    ]);
});

Route::get('/routing', function () {
    return view('routing');
});

Route::get('/basic_routing', function () {
    return 'Hello World';
});

Route::view('/view_route', 'view_route');
Route::view('/view_route', 'view_route', ['name' => 'Syafarul']);

Route::get('/controller_route', [RouteController::class, 'index']);

Route::redirect('/', '/routing');

Route::get('/user/{id}', function($id) {
    return "User Id: ".$id;
});
Route::get('/posts/{post}/comments/{comment}', function($postId, $commentId) {
    return "Post Id: ".$postId.", Comment Id: ".$commentId;
});

Route::get('username/{name?}', function($name = null) {
    return 'Username: '.$name;
});

Route::get('/title/{title}', function($title) {
    return "Title: ".$title;
})->where('title', '[A-Za-z]+');

Route::get('/profile/{profileId}', [RouteController::class, 'profile'])->name('profileRouteName');

//Route::get('/route_priority/{rpId}', function($rpId) {
//    return "This is Route One";
//});
Route::get('/route_priority/user', function() {
    return "This is Route 1";
});
Route::get('/route_priority/user', function() {
    return "This is Route 2";
});

Route::fallback(function() {
    return 'This is Fallback Route';
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', function() {
        return "This is admin dashboard";
    })->name('dashboard');
    Route::get('/users', function() {
        return "This is user data on admin page";
    })->name('users');
    Route::get('/items', function() {
        return "This is item data on admin page";
    })->name('items');
});

