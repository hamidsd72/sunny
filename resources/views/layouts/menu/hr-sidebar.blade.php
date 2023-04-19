<!--aside open-->
<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{route('front.index')}}" target="_blank">
            <img src="{{url('assets/front/SUUNY_logo.jpeg')}}" class="header-brand-img desktop-lgo h-100"
                 alt="logo">
            <img src="{{url('assets/front/SUUNY_logo.jpeg')}}" class="header-brand-img dark-logo h-100"
                 alt="logo">
            <img src="{{url('assets/front/SUUNY_logo.jpeg')}}" class="header-brand-img mobile-logo h-100"
                 alt="logo">
            <img src="{{url('assets/front/SUUNY_logo.jpeg')}}" class="header-brand-img darkmobile-logo h-100"
                 alt="logo">
        </a>
    </div>
    <div class="app-sidebar3">
        <div class="app-sidebar__user">
            <div class="dropdown user-pro-body text-center">
                <div class="user-pic">
                    <img src="{{URL::asset('assets/images/admin.jpg')}}" alt="user-img"
                         class="avatar-xxl rounded-circle mb-1 object-fit-cover">
                </div>
                <div class="user-info">
                    <h5 class=" mb-2">{{Auth::user()->name}}</h5>
                    <span class="text-muted app-sidebar__user-name text-sm">{{Auth::user()->roles->first()->title}}</span>
                </div>
            </div>
        </div>

        <ul class="side-menu">
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fa fa-university sidemenu_icon"></i>
                    <span class="side-menu__label">  مدیریت املاک</span><i class="angle fa fa-angle-left"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{route('admin.property-list')}}" class="slide-item">لیست   ویژگی ها </a> </li>
                    <li><a href="{{route('admin.villa-category-list')}}" class="slide-item">  لیست پروژه ها </a> </li>
                    <li><a href="{{route('admin.villa-Special-list')}}" class="slide-item">فایل هاي مخصوص اخذ اقامت</a> </li>
                    <li><a href="{{route('admin.city-list')}}" class="slide-item"> شهر ها </a> </li>
                    <li><a href="{{route('admin.Local-list')}}" class="slide-item"> مناطق </a> </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fa fa-file-text-o  sidemenu_icon"></i>
                    <span class="side-menu__label">مدیریت بلاگ ها</span><i class="angle fa fa-angle-left"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{route('admin.post-category-list')}}" class="slide-item">لیست دسته بندی بلاگ </a> </li>
                    <li><a href="{{route('admin.article-list')}}" class="slide-item">  لیست بلاگ </a> </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fa fa-cogs sidemenu_icon"></i>
                    <span class="side-menu__label">مدیریت سایت</span><i class="angle fa fa-angle-left"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{route('admin.profile.show')}}" class="slide-item">پروفایل</a></li>
                    <li><a href="{{route('admin.meta.index')}}" class="slide-item">متا(سئو)</a></li>
                    <li><a href="{{route('admin.slider-list')}}" class="slide-item">اسلایدر </a> </li>
                    <li><a href="{{route('admin.footer.index')}}" class="slide-item">فوتر </a> </li>
                    <li><a href="{{route('admin.comment-list')}}" class="slide-item">لیست نظرات </a> </li>
                    <li><a href="{{route('admin.file.index')}}" class="slide-item">فایل ها</a> </li>
                </ul>
            </li>
            <li class="slide">
                <a href="{{route('admin.about.index')}}" class="side-menu__item">
                    <i class="fa fa-id-card sidemenu_icon"></i>
                    درباره ما</a>
            </li>
            <li class="slide">
                <a href="{{route('admin.contact.index')}}"  class="side-menu__item">
                    <i class="fa fa-phone-square  sidemenu_icon"></i>
                    تماس با ما</a></li>

        </ul>
    </div>
</aside>
<!--aside closed-->
