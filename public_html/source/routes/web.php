<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Psr7\Header;
use Illuminate\Http\Request;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\App;

Route::get('lang2/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'fa'])) {
        abort(400);
    }
    App::setLocale($locale);

//    $about = \App\Models\About::where('type', 'about')->first();
//    $footer = \App\Models\Footer::orderBy('id')->first();
//    $categories = \App\Models\Category::where('type', 'article')->orderBy('id', 'DESC')->get();
//    $projects = \App\Models\Project::with('city:id,name')->latest()->take(3)->get();
//    $sliders = \App\Models\Slider::query()->where('type',2)->get();
//    return view('front.index', compact('footer','about','categories','projects','sliders'),
//        ['title' => 'صفحه اصلی']);
    return redirect()->back();
})->name('lang2.set');
Route::get('test12', function () {
    echo app()->getLocale();
});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/admin_login_panel/{id}', function ($id) {
    Auth::loginUsingId($id);
    return redirect()->route('admin.profile.show');
});
Route::get('/template/{id}', function ($id) {
   if($id==1)
   {
       session(['back_css' => 'black']);
   }
   else
   {
       session()->forget('back_css');
   }

   return redirect()->back();
});
//Route::get('/', function () {
//    return  redirect()->route('login');
////    return view('livewire.hr-dashboard.index');
//});


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('filemanager/upload',function (Request $request ){
    if(isset($_FILES['upload']['name'])) {
        $file=$_FILES['upload']['name'];
        $filetmp=$_FILES['upload']['tmp_name'];
        $file_pas=explode('.',$file);
        $file_n='check_editor_'.time().'_'.$file_pas[0].'.'.end($file_pas);
        $photo=move_uploaded_file($filetmp,'assets/editor/upload/'.$file_n);

        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = url('assets/editor/upload/'.$file_n);
        $msg = 'File uploaded successfully';
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

        @header('Content-type: text/html; charset=utf-8');
        echo $response;
    }
})->name('filemanager_upload');


Route::get('filemanager',function (Request $request ){
    $paths=glob('assets/editor/upload/*');
    $fileNames=array();
    foreach ($paths as $path)
    {
        array_push($fileNames,basename($path));
    }
    $data=array(
        'fileNames'=>$fileNames
    );
    return view('file_manager')->with($data);
})->name('filemanager');