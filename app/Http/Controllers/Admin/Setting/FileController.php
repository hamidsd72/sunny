<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Models\File as Data;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class FileController extends Controller {

    public function controller_title($type) {
        if ($type == 'sum') {
            return 'فایل ها';
        } elseif ('single') {
            return 'فایل';
        }
    }

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $items = Data::orderByDesc('id')->get();
        return view('admin.setting.file.index', compact('items'), ['title' => $this->controller_title('single'), 'title2' => $this->controller_title('sum')]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:250',
            'path'  => 'required|max:81920',

        ],
            [
                'title.required' => 'نام فایل  را وارد کنید',
                'title.max'      => 'نام فایل نباید بیشتر از 250 کاراکتر باشد',
                'path.required'  => 'فایل را وارد کنید',
                'path.max'       => 'حجم فایل حداکثر 80 مگابایت باشد',
            ]);
        try {
            $item = new Data();
            $item->title        = $request->title;
            if ($request->hasFile('path')) {
                $item->path = file_store($request->path, 'source/asset/uploads/data/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/files/', 'file-');
            }
            $item->save();
            return redirect()->back()->withInput()->with('flash_message', 'با موفقیت ایجاد شد.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در ایجاد بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function destroy($id) {
        $item = Data::findOrFail($id);
        if ($item->path != null) {
            File::delete($item->path);
        }
        $item->delete();
        return redirect()->back()->withInput()->with('flash_message', 'فایل با موفقیت حذف شد.');
    }
}

