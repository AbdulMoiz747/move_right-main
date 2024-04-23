<aside class="dash-aside-navbar">
    <div class="position-relative">
        <div class="logo d-md-block d-flex align-items-center justify-content-between plr bottom-line pb-30">
            <a href="{{ route("public.home") }}">
                <img src=" {{ asset("images/logo/logo_07.svg") }}" alt="">
            </a>
            <button class="close-btn d-block d-md-none"><i class="fa-light fa-circle-xmark"></i></button>
        </div>
        <nav class="dasboard-main-nav pt-30 pb-30 bottom-line">
            <ul class="style-none">
                <li class="plr"><a href="{{ route("buyers.dashboard") }}" class="d-flex w-100 align-items-center ">
                    <img src=" {{ asset("dashboard/images/icon/icon_1.svg") }} " alt="">
                    <span>Dashboard</span>
                </a></li>
                <li class="bottom-line pt-30 lg-pt-20 mb-40 lg-mb-30"></li>
                <li><div class="nav-title">Profile</div></li>
                <li class="plr"><a href="{{ route("buyers.profile", $buyer->id) }}" class="d-flex w-100 align-items-center">
                    <img src=" {{ asset("dashboard/images/icon/icon_3.svg") }} " alt="">
                    <span>Profile</span>
                </a></li>
                <li class="bottom-line pt-30 lg-pt-20 mb-40 lg-mb-30"></li>
                <li><div class="nav-title">Contracts</div></li>
                <li class="plr">
                    <a href="{{ route("buyers.contracts") }}" class="d-flex w-100 align-items-center">
                        <img src=" {{ asset("dashboard/images/icon/icon_6.svg") }} " alt="">
                        <span>My Contracts</span>
                    </a>
                </li>
                
                <li class="bottom-line pt-30 lg-pt-20 mb-40 lg-mb-30"></li>
                <li><div class="nav-title">Inspection Reports</div></li>
                <li class="plr">
                    <a href="{{ route("buyers.inspections") }}" class="d-flex w-100 align-items-center">
                        <img src=" {{ asset("dashboard/images/icon/icon_6.svg") }} " alt="">
                        <span>Inspection Reports</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="profile-complete-status  pb-35 plr">
            <a href="{{ route("buyers.logout") }}" class="d-flex w-100 align-items-center logout-btn">
                <div class="icon tran3s d-flex align-items-center justify-content-center rounded-circle"><img src=" {{ asset("dashboard/images/icon/icon_41.svg") }} " alt=""></div>
                <span>Logout</span>
            </a>
        </div>
    </div>
</aside>