 <?php

    use App\Models\Admin\AksesModel;
    use App\Models\Admin\MenuModel;
    use App\Models\Admin\SubmenuModel;
    use Illuminate\Support\Facades\Session;

    $menu = MenuModel::orderBy('menu_sort', 'ASC')->get();
    ?>
 <!--APP-SIDEBAR-->
 <div class="sticky">
     <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
     <div class="app-sidebar">
         <div class="side-header">
             <a class="header-brand1" href="{{url('/admin')}}">
                 @if($web->web_logo == '' || $web->web_logo == 'default.png')
                 <img src="{{url('/assets/default/web/default.png')}}" height="40px" class="header-brand-img toggle-logo" alt="logo">
                 <div class="header-brand-img desktop-logo">
                     <div class="d-flex align-items-center">
                         <img src="{{url('/assets/default/web/default.png')}}" height="40px" class="me-1" alt="logo">
                         <h4 class="fw-bold mt-4 text-white text-uppercase text-truncate">{{$web->web_nama}}</h4>
                     </div>
                 </div>
                 <img src="{{url('/assets/default/web/default.png')}}" height="40px" class="header-brand-img light-logo" alt="logo">
                 <div class="header-brand-img light-logo1">
                     <div class="d-flex align-items-center">
                         <img src="{{url('/assets/default/web/default.png')}}" height="40px" class="me-1" alt="logo">
                         <h4 class="fw-bold mt-4 text-black text-uppercase text-truncate">{{$web->web_nama}}</h4>
                     </div>
                 </div>
                 @else
                 <img src="{{asset('storage/web/' . $web->web_logo)}}" height="40px" class="header-brand-img toggle-logo" alt="logo">
                 <div class="header-brand-img desktop-logo">
                     <div class="d-flex align-items-center">
                         <img src="{{asset('storage/web/' . $web->web_logo)}}" height="40px" class="me-1" alt="logo">
                         <h4 class="fw-bold mt-4 text-white text-uppercase text-truncate">{{$web->web_nama}}</h4>
                     </div>
                 </div>
                 <img src="{{asset('storage/web/' . $web->web_logo)}}" height="40px" class="header-brand-img light-logo" alt="logo">
                 <div class="header-brand-img light-logo1">
                     <div class="d-flex align-items-center">
                         <img src="{{asset('storage/web/' . $web->web_logo)}}" height="40px" class="me-1" alt="logo">
                         <h4 class="fw-bold mt-4 text-black text-uppercase text-truncate">{{$web->web_nama}}</h4>
                     </div>
                 </div>
                 @endif
             </a>
             <!-- LOGO -->
         </div>
         <div class="main-sidemenu">
             <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                     <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                 </svg></div>
                 <ul class="side-menu">
    @if(count($menu) > 0)
    <li class="sub-category">
        <h3>Menu</h3>
    </li>
    @endif

    <!-- Manual Menu Items -->
    <li class="slide">
        <a class="side-menu__item " href="{{url('/admin/dashboard')}}">
            <i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span>
        </a>
    </li>
    <li class="slide">
        <a class="side-menu__item " href="{{url('/admin/rekening')}}">
            <i class="side-menu__icon fe fe-credit-card"></i><span class="side-menu__label">Rekening</span>
        </a>
    </li>
    <li class="slide">
        <a class="side-menu__item " href="{{url('/admin/approval')}}">
            <i class="side-menu__icon fe fe-credit-card"></i><span class="side-menu__label">Approval</span>
        </a>
    </li>
    <!-- Additional dynamically generated menu items... -->
</ul>
             <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                     <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                 </svg></div>
         </div>
     </div>
     <!--/APP-SIDEBAR-->
 </div>