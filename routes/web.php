<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('newsletter', function (){
    request()->validate(['email'=>'required|email']);
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us21'
    ]);

    $response = $mailchimp->lists->addListMember('d3c0c9562',[
       'email_address'=>request('email'),
       'status'=>'subscribed'
    ]);


    return redirect('/');
});


Route::get('/', [PostController::class,'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('categories/{category:slug}', function (Category $category){
    return view('posts', [
        'posts' => $category->posts()->paginate(6)
    ]);
})->name('category');

Route::get('authors/{author:username}', function (User $author){

    return view('posts', [
        'posts' =>$author->post
    ]);
})->name('authors');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::middleware('admin')->group(function (){
    Route::resource('admin/posts',AdminPostController::class)->except('show');
//    Route::get('admin/posts/create', [AdminPostController::class, 'create']);
//    Route::post('admin/posts', [AdminPostController::class, 'store']);
//    Route::get('admin/posts', [AdminPostController::class, 'index']);
//    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
//    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
//    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);

});

