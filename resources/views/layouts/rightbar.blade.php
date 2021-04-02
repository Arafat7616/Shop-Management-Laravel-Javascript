<div class="rightbar">
    <!-- Start Topbar Mobile -->
    <div class="topbar-mobile">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="mobile-logobar">
                    <a href="{{url('/')}}" class="mobile-logo"><img src="assets/images/logo.svg" class="img-fluid" alt="logo"></a>
                </div>
                <div class="mobile-togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="topbar-toggle-icon">
                                <a class="topbar-toggle-hamburger" href="javascript:void();">
                                    <img src="assets/images/svg-icon/horizontal.svg" class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                    <img src="assets/images/svg-icon/verticle.svg" class="img-fluid menu-hamburger-vertical" alt="verticle">
                                 </a>
                             </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger" href="javascript:void();">
                                    <img src="assets/images/svg-icon/collapse.svg" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                    <img src="assets/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                                 </a>
                             </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar Mobile -->
    <!-- Start Topbar -->
    <div class="topbar">
        <!-- Start row -->
        <div class="row align-items-center">
            <!-- Start col -->
            <div class="col-md-12 align-self-center">
                <div class="togglebar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="menubar">
                                <a class="menu-hamburger" href="javascript:void();">
                                   <img src="assets/images/svg-icon/collapse.svg" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                   <img src="assets/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                                 </a>
                             </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="searchbar">
                                <form>
                                    <div class="input-group">
                                      <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                      <div class="input-group-append">
                                        <button class="btn" type="submit" id="button-addon2"><img src="assets/images/svg-icon/search.svg" class="img-fluid" alt="search"></button>
                                      </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="infobar">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <div class="notifybar">
                                <a href="javascript:void(0)" id="infobar-notifications-open" class="infobar-icon">
                                    <img src="assets/images/svg-icon/notifications.svg" class="img-fluid" alt="notifications">
                                    <span class="live-icon"></span>
                                </a>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="settingbar">
                                <a href="javascript:void(0)" id="infobar-settings-open" class="infobar-icon">
                                    <img src="assets/images/svg-icon/settings.svg" class="img-fluid" alt="settings">
                                </a>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="languagebar">
                                <div class="dropdown">
                                  <a class="dropdown-toggle" href="#" role="button" id="languagelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag flag-icon-us flag-icon-squared"></i></a>
                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languagelink">
                                    <a class="dropdown-item" href="#"><i class="flag flag-icon-us flag-icon-squared"></i>English</a>
                                    <a class="dropdown-item" href="#"><i class="flag flag-icon-cn flag-icon-squared"></i>Chinese</a>
                                    <a class="dropdown-item" href="#"><i class="flag flag-icon-ru flag-icon-squared"></i>Russian</a>
                                    <a class="dropdown-item" href="#"><i class="flag flag-icon-es flag-icon-squared"></i>Spanish</a>
                                  </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Topbar -->
    @yield('rightbar-content')
    <!-- Start Footerbar -->
    <div class="footerbar">
        <footer class="footer">
            <p class="mb-0"><a href="https://www.datatechbd.com/" target="_blank"><b>Design & Developed By DataTech BD Ltd.</b></a>© 2020 BD HIKE PLUS - All Rights Reserved.</p>
        </footer>
    </div>
    <!-- End Footerbar -->
</div>
