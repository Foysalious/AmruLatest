<section class="topbar-pc">
    <div class="container-fluid">
        <div class="row">

            <!-- logo start -->
            <div class="col-md-3 col-3">
                <div class="logo">
                    @foreach( App\Models\Backend\Logo::get() as $logo )
                    <img src="{{ asset('images/logo/'. $logo->image) }}" class="img-fluid" alt=""> 
                    @endforeach               
                </div>            
            </div>
            <!-- logo end -->

            <!-- bar start -->
            <div class="col-1 col-1 for-mob">
                <i class="fas fa-bars show-nav"></i>
                <i class="fas fa-times hide-nav"></i>
            </div>
            <!-- bar end -->

            <!-- my profile start -->
            <div class="col-md-9 col-7">
                <div class="my-profile">
                    <ul>
                        <li>
                            @if( Auth::user()->image == NULL )
                            <img src="{{ asset('backend/images/user.png') }}" width="32px" style="border-radius: 100%;" class="img-fluid" alt=""> 
                            @else
                            <img src="{{ asset('images/user/'.Auth::user()->image) }}" width="32px" style="border-radius: 100%;" class="img-fluid" alt=""> 
                            @endif 
                        </li>
                        <li class="user-admin">
                            <i class="fas fa-user"></i>
                            <div class="profile-dropdown">
                                <ul>
                                    <li>
                                        <a href="{{ route('profile.edit', Auth::user()->id ) }}">My Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>            
            </div>
            <!-- my profile end -->

        </div>
    </div>
</section>