<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ProjectController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Front\CommentController;
use App\Models\Footer;
use App\Models\Comment;

Route::get('lang/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang.set');


    //blog
Route::get('/blogs/{slug?}', [BlogController::class,'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class,'show'])->name('blog.show');
Route::get('/blog-category', [BlogController::class,'category'])->name('blog.category');
Route::get('/blog-list/{catId}', [BlogController::class,'categoryShow'])->name('blog.category.show');
    //projects
Route::get('projects', [ProjectController::class,'index'])->name('projects.index');
Route::get('projects/{slug}', [ProjectController::class,'show'])->name('projects.show');

    //search
Route::get('search',[SearchController::class,'show'])->name('search');

    //index
Route::get('/', [HomeController::class,'index'])->name('index');
    //search
    //Route::get('/search', [HomeController::class,'search'])->name('search');
    //seen
Route::get('/seen/{tbl}/{id}', [HomeController::class,'seen'])->name('seen');
// about us
Route::get('/about-us', [HomeController::class,'about'])->name('about.us');
// contact us
Route::get('/contact-us', [HomeController::class,'contact_info'])->name('contact.us');
Route::post('/contact', [HomeController::class,'contact'])->name('contact');

// comment
Route::post('comment-store', [CommentController::class,'store'])->name('user-comment-store');

Route::get('/خرید-خانه-در-استانبول',function() {
    if(app()->getLocale()!='fa')
    {
        return redirect()->route('front.index');
    }
    $footer = Footer::orderBy('id')->first();
    $Comments = Comment::orderBy('id')->where('reply_id',0)->where('status','active')->where('landing_id',1)->get();
    return view('front.landing.1',compact('footer','Comments'));
});
Route::get('/اقامت-و-شهروندی-در-ترکیه',function() {
    if(app()->getLocale()!='fa')
    {
        return redirect()->route('front.index');
    }
    $footer = Footer::orderBy('id')->first();
    $Comments = Comment::orderBy('id')->where('reply_id',0)->where('status','active')->where('landing_id',2)->get();
    return view('front.landing.2',compact('footer','Comments'));
});
Route::get('/سرمایه-گذاری-در-ترکیه',function() {
    if(app()->getLocale()!='fa')
    {
        return redirect()->route('front.index');
    }
    $footer = Footer::orderBy('id')->first();
    $Comments = Comment::orderBy('id')->where('reply_id',0)->where('status','active')->where('landing_id',3)->get();
    return view('front.landing.3',compact('footer','Comments'));
});


//fallback
Route::fallback(function() {
    $footer = Footer::orderBy('id')->first();
    return view('front.fallback',compact('footer'));
});


//// news
//Route::get('/all/list/{id?}/{slug?}', [HomeController::class,'all_list'])->name('all.list');
//Route::get('/news/list/{id?}/{slug?}', [HomeController::class,'news_list'])->name('news.list');
//Route::get('/news/show/{id}/{slug}', [HomeController::class,'news_show'])->name('news.show');
//Route::get('/n/{id}/{slug?}', [HomeController::class,'news_show'])->name('news.show.short');
//// gallery image&video
//Route::get('/gallery/{type}', [HomeController::class,'gallery'])->name('gallery');
//// report
//Route::get('/report/list/{id?}/{slug?}', [HomeController::class,'report_list'])->name('report.list');
//// interview
//Route::get('/interview/list/{id?}/{slug?}', [HomeController::class,'interview_list'])->name('interview.list');
//// translate
//Route::get('/translate/list/{id?}/{slug?}', [HomeController::class,'translate_list'])->name('translate.list');
//// note
//Route::get('/note/list/{id?}/{slug?}', [HomeController::class,'note_list'])->name('note.list');
//// memory
//Route::get('/memory/list', [HomeController::class,'memory_list'])->name('memory.list');
//// new_face
//Route::get('/new-face/list/{id?}/{slug?}', [HomeController::class,'new_face_list'])->name('new.face.list');
//Route::get('/new-face/show/{id}/{slug}', [HomeController::class,'new_face_show'])->name('new.face.show');
//Route::get('/nf/{id}/{slug?}', [HomeController::class,'new_face_show'])->name('new.face.show.short');
//// week_face
//Route::get('/week-face/list/{id?}/{slug?}', [HomeController::class,'week_face_list'])->name('week.face.list');
//Route::get('/week-face/show/{id}/{slug}', [HomeController::class,'week_face_show'])->name('week.face.show');
//Route::get('/wf/{id}/{slug?}', [HomeController::class,'week_face_show'])->name('week.face.show.short');
//// calender
//Route::get('/calender/list/{id?}/{slug?}', [HomeController::class,'calender_list'])->name('calender.list');
//Route::get('/calender/show/{id}/{slug}', [HomeController::class,'calender_show'])->name('calender.show');
//Route::get('/c/{id}/{slug?}', [HomeController::class,'calender_show'])->name('calender.show.short');
//// week_book
//Route::get('/week-book/list/{id?}/{slug?}', [HomeController::class,'week_book_list'])->name('week.book.list');
//Route::get('/week-book/show/{id}/{slug}', [HomeController::class,'week_book_show'])->name('week.book.show');
//Route::get('/wb/{id}/{slug?}', [HomeController::class,'week_book_show'])->name('week.book.show.short');
//// gramophone
//Route::get('/gramophone/list', [HomeController::class,'gramophone_list'])->name('gramophone.list');
//// podcast
//Route::get('/podcast/list', [HomeController::class,'podcast_list'])->name('podcast.list');
//
//


//
//// **** migration ****
//use Illuminate\Database\Schema\Blueprint;
//use Illuminate\Support\Facades\Schema;
//Route::get('/db', function () {
//    Schema::create('footers', function (Blueprint $table) {
//        $table->id();
//        $table->string('whatsapp');
//        $table->string('instagram');
//        $table->string('telegram');
//        $table->string('phone');
//        $table->string('email');
//        $table->string('address');
//        $table->string('tweet1');
//        $table->string('tweet2');
//        $table->string('tweet3');
//        $table->string('news');
//        $table->timestamps();
//    });
//});
