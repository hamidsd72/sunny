<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Setting\ProfileController;
use App\Http\Controllers\Admin\Setting\SliderController;
use App\Http\Controllers\Admin\Setting\MetaController;
use App\Http\Controllers\Admin\Setting\AboutController;
use App\Http\Controllers\Admin\Setting\ContactController;
use App\Http\Controllers\Admin\Setting\UploadController;
use App\Http\Controllers\Admin\Setting\FooterController;
use App\Http\Controllers\Admin\Setting\PostCategoryController;
use App\Http\Controllers\Admin\Setting\ArticleController;
use App\Http\Controllers\Admin\Setting\PropertyController;
use App\Http\Controllers\Admin\Setting\VillaCategoryController;
use App\Http\Controllers\Admin\Setting\CityController;
use App\Http\Controllers\Admin\Setting\LocalController;
use App\Http\Controllers\Admin\Setting\CommentController;
use App\Http\Controllers\Admin\Setting\VillaSpecialController;

//Setting
Route::get('profile', [ProfileController::class,'show'])->name('profile.show');
Route::patch('profile/{id}/update', [ProfileController::class,'update'])->name('profile.update');

Route::resource('meta', MetaController::class);
Route::get('meta-status/{id}/{type}/{status}', [MetaController::class,'status'])->name('meta.status');

Route::resource('about', AboutController::class);

Route::resource('contact', ContactController::class);

Route::resource('footer', FooterController::class);

// slider
Route::get('slider-create', [SliderController::class, 'create'])->name('slider-create');
Route::post('slider-store', [SliderController::class, 'store'])->name('slider-store');
Route::get('slider-list', [SliderController::class, 'index'])->name('slider-list');
Route::delete('slider-destroy/{id}', [SliderController::class, 'destroy'])->name('slider-destroy');
Route::get('slider-edit/{id}', [SliderController::class, 'edit'])->name('slider-edit');
Route::put('slider-update', [SliderController::class, 'update'])->name('slider-update');

// categories
Route::get('post-category-create/{type?}', [PostCategoryController::class,'create'])->name('post-category-create');
Route::post('post-category-store',  [PostCategoryController::class,'store'])->name('post-category-store');
Route::get('post-category-list/{type?}',  [PostCategoryController::class,'index'])->name('post-category-list');
Route::get('post-category-edit/{id}',  [PostCategoryController::class,'edit'])->name('post-category-edit');
Route::patch('post-category-update/{id}',  [PostCategoryController::class,'update'])->name('post-category-update');
Route::delete('post-category-destroy/{id}', [PostCategoryController::class,'destroy'])->name('post-category-destroy');
//Route::post('post-category-sort',  [PostCategoryController::class,'sort_item'])->name('post-category-sort');

// Article
Route::get('post-create/{type?}', [ArticleController::class,'create'])->name('article-create');
Route::post('post-store', [ArticleController::class,'store'])->name('article-store');
Route::get('post-list/{type?}',[ArticleController::class,'index'])->name('article-list');
Route::get('post-show/{id}', [ArticleController::class,'show'])->name('article-show');
Route::get('post-edit/{id}', [ArticleController::class,'edit'])->name('article-edit');
Route::patch('post-update/{id}', [ArticleController::class,'update'])->name('article-update');
Route::delete('post-destroy/{id}', [ArticleController::class,'destroy'])->name('article-destroy');
Route::post('post-list', [ArticleController::class,'search'])->name('article-search');

// properties
Route::get('property-create', [PropertyController::class, 'create'])->name('property-create');
Route::post('property-store', [PropertyController::class, 'store'])->name('property-store');
Route::get('property-list', [PropertyController::class, 'index'])->name('property-list');
Route::get('property-edit/{id}', [PropertyController::class, 'edit'])->name('property-edit');
Route::patch('property-update/{id}', [PropertyController::class, 'update'])->name('property-update');
Route::delete('property-destroy/{id}', [PropertyController::class, 'destroy'])->name('property-destroy');
Route::post('property-search', [PropertyController::class, 'search'])->name('property-search');

// projects
Route::get('villa-category-create', [VillaCategoryController::class, 'create'])->name('villa-category-create');
Route::post('villa-category-store', [VillaCategoryController::class, 'store'])->name('villa-category-store');
Route::get('villa-category-list', [VillaCategoryController::class, 'index'])->name('villa-category-list');
Route::get('villa-category-edit/{id}', [VillaCategoryController::class, 'edit'])->name('villa-category-edit');
Route::patch('villa-category-update/{id}', [VillaCategoryController::class, 'update'])->name('villa-category-update');
Route::delete('villa-category-destroy/{id}', [VillaCategoryController::class, 'destroy'])->name('villa-category-destroy');
Route::get('villa-category-video-delete/{id}', [VillaCategoryController::class, 'video_delete'])->name('villa-category-video-delete');
Route::get('villa-category-video-delete-lang/{id}/{lang}', [VillaCategoryController::class, 'video_delete_lang'])->name('villa-category-video-delete-lang');
Route::post('villa-category-sort', [VillaCategoryController::class, 'sort_item'])->name('villa-category-sort');
Route::get('villa-category-photo-destroy/{id}', [VillaCategoryController::class, 'photo_destroy'])->name('villa-category-photo-destroy');

// projects Special

Route::get('villa-Special-create', [VillaSpecialController::class, 'create'])->name('villa-Special-create');
Route::post('villa-Special-store', [VillaSpecialController::class, 'store'])->name('villa-Special-store');
Route::get('villa-Special-list', [VillaSpecialController::class, 'index'])->name('villa-Special-list');
Route::get('villa-Special-edit/{id}', [VillaSpecialController::class, 'edit'])->name('villa-Special-edit');
Route::patch('villa-Special-update/{id}', [VillaSpecialController::class, 'update'])->name('villa-Special-update');

Route::post('find-city', [CityController::class, 'findCity'])->name('findCity');



// city
Route::get('city-create', [CityController::class,'create'])->name('city-create');
Route::put('city-store', [CityController::class,'store'])->name('city-store');
Route::get('city-list', [CityController::class,'index'])->name('city-list');
Route::get('city-edit/{id}', [CityController::class,'edit'])->name('city-edit');
Route::patch('city-update/{id}', [CityController::class,'update'])->name('city-update');
Route::delete('city-destroy/{id}', [CityController::class,'destroy'])->name('city-destroy');

// city
Route::get('Local-create', [LocalController::class,'create'])->name('Local-create');
Route::put('Local-store', [LocalController::class,'store'])->name('Local-store');
Route::get('Local-list', [LocalController::class,'index'])->name('Local-list');
Route::get('Local-edit/{id}', [LocalController::class,'edit'])->name('Local-edit');
Route::patch('Local-update/{id}', [LocalController::class,'update'])->name('Local-update');
Route::delete('Local-destroy/{id}', [LocalController::class,'destroy'])->name('Local-destroy');


// top city
Route::get('topcity-list', [TopCityController::class, 'index'])->name('topcity-list');
Route::get('topcity-edit/{id}', [TopCityController::class, 'edit'])->name('topcity-edit');
Route::put('topcity-update/{id}', [TopCityController::class, 'update'])->name('topcity-update');


// comment
Route::get('comment-create/{id}', [CommentController::class,'create'])->name('comment-create');
Route::put('comment-store', [CommentController::class,'store'])->name('comment-store');
Route::get('comment-list', [CommentController::class,'index'])->name('comment-list');
Route::delete('comment-destroy/{id}', [CommentController::class,'destroy'])->name('comment-destroy');
Route::get('comment-active/{id}', [CommentController::class,'active'])->name('comment-active');