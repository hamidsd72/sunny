<?php

namespace App\Http\Controllers\Front;

use App\Models\Slider;
use App\Models\Report;

use App\Models\About;
use App\Models\ContactInfo;
use App\Models\Contact;
use App\Models\Footer;
use App\Models\Project;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {

        $about = About::where('type', 'about')->first();
        $footer = Footer::orderBy('id')->first();
        $categories = Category::where('type', 'article')->orderBy('id', 'DESC')->get();
        $projects = Project::with('city:id,name')->where('status_'.app()->getLocale(),'active')->latest()->take(3)->get();
        $sliders = Slider::query()->where('type',2)->get();
        $about = About::where('type', 'about')->first();
        $about_sliders = $about->photos;
        return view('front.index', compact('footer','about','categories','projects','sliders','about_sliders'),
            ['title' => 'صفحه اصلی']);
    }


    public function seen($tbl, $id)
    {
        $link = '';
        if ($tbl == 'banner') {
            $item = Banner::find($id);
            $link = $item->link;
        } elseif ($tbl == 'ad') {
            $item = Ad::find($id);
            $link = $item->link;
        } elseif ($tbl == 'slider') {
            $item = Slider::find($id);
            $link = $item->link;
        }
        if (!$link) {
            return redirect()->back()->with('err_message', 'لینک یافت نشد');
        }
        $item->seen += 1;
        $item->update();
        return redirect($link);
    }

    public function about()
    {
        $about = About::where('type', 'about')->first();
        $sliders = $about->photos;
        $footer = Footer::orderBy('id')->first();
        return view('front.about', compact('footer','sliders', 'about'), ['title' => 'درباره ما']);
    }

    public function contact(Request $request)
    {
        try {
            $item = new Contact();
            $item->name = $request->name ?? '---';
            $item->email = $request->email ?? '---';
            $item->phone = $request->phone ?? '---';
            $item->message = $request->message ?? '---';
            $item->description = serialize($request->all());
            $item->save();
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $headers .= 'From: <info@vandidadgroup.com.tr>' . "\r\n";
            $email = 'info@vandidadgroup.com.tr';
//            $email='adeln1368@gmail.com';
            $subject = 'تماس با ما';
            $masage = '<h2 style="text-align: center;margin-bottom: 20px;margin-top: 20px">تماس با ما</h2>';
            $masage .= '<p style="text-align: right;direction: rtl">نام : ' . $request->name ?? '---' . '</p>';
            $masage .= '<p style="text-align: right;direction: rtl">ایمیل : <span style="direction: ltr!important"> ' . $request->email ?? '---' . ' </span></p>';
            $masage .= '<p style="text-align: right;direction: rtl">شماره تماس : <span style="direction: ltr!important"> ' . $request->phone ?? '---' . ' </span></p>';
            $masage .= '<hr/>';
            $masage .= '<p style="text-align: right;direction: rtl">' . $request->message ?? '---' . '</p>';


            $msg = '<div style="width: 95%;min-height: 300px;margin: auto;position: relative;border: 1px solid #e1e1e1;direction: rtl">';
            $msg .= '<div style="padding:20px;text-align: justify;font-size: 18px">';
            $msg .= $masage;
            $msg .= '</div>';
            $msg .= '</div>';
            mail($email, $subject, $msg, $headers);
            return redirect()->back()->with('flash_message', 'پیام شما با موفقیت ارسال شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'مشکلی در ارسال پیام بوجود آمده،مجددا تلاش کنید');
        }
    }

    public function contact_info()
    {
        $contact = ContactInfo::first();
        $footer = Footer::orderBy('id')->first();

        return view('front.contact', compact('footer', 'contact',
        ), ['title' => 'تماس با ما']);
    }

}
