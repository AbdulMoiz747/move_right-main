<header class="dashboard-header">
    <div class="d-flex align-items-center justify-content-end">
        <h4 class="m0 d-none d-lg-block">Dashboard</h4>
        <button class="dash-mobile-nav-toggler d-block d-md-none me-auto">
            <span></span>
        </button>
        <form action="#" class="search-form ms-auto">
        </form>
        <div class="profile-notification position-relative dropdown-center ms-3 ms-md-5 me-4">
        </div>
        <div class="d-none d-md-block me-3">
            <a href="{{ route("landlords.properties.create") }}" class="btn-two"><span>Add Listing</span> <i class="fa-thin fa-arrow-up-right"></i></a>
        </div>
        <div class="user-data position-relative">
            <button class="user-avatar online position-relative rounded-circle dropdown-toggle" type="button" id="profile-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                <img src=" {{ asset("/images/lazy.svg") }} " data-src=" {{ $landlord->profile_picture ? Storage::url($landlord->profile_picture) : Storage::url("profile-pictures/default.svg") }}
                " alt="" class="lazy-img">
            </button>
            <!-- /.user-avatar -->
            <div class="user-name-data">
                <ul class="dropdown-menu" aria-labelledby="profile-dropdown">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route("landlords.profile", $landlord->id) }}"><img src="../images/lazy.svg" data-src=" {{ asset("dashboard/images/icon/icon_23.svg") }} " alt="" class="lazy-img"><span class="ms-2 ps-1">Profile</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.user-data -->
    </div>
</header>