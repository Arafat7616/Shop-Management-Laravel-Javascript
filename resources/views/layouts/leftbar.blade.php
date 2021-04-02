<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <h3><b>BD HIKE</b></h3>
        </div>
        <!-- End Logobar -->
        <!-- Start Profilebar -->
        <div class="profilebar text-center" style="">
            <img src="{{ asset('uploads/images/'.auth()->user()->image) }}" class="img-fluid">
            <div class="profilename">
                <h5 class="text-white">{{ auth()->user()->name }}</h5>
                <p>{{ auth()->user()->phone }}</p>
            </div>
            <div class="userbox">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item" id="lo">
                        <a href="#" onclick="logout()" class="profile-icon">
                            <img src="{{ asset('assets/images/svg-icon/logout.svg') }}" class="img-fluid" alt="logout">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End Profilebar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li class="vertical-header">Main</li>
                <li>
                    <a href="{{ route('invoice.index') }}">
                      <img src="assets/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Invoice</span>
                    </a>
                </li>

                @if(auth()->user()->type == 1)
                <li>
                    <a href="{{ route('admin.product.index') }}">
                      <img src="assets/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Stock Product</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.sale.index') }}">
                      <img src="assets/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Sold Items</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.staff.index') }}">
                      <img src="assets/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard"><span>Staff</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
