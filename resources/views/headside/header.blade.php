<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
            </div>
            <div class="top-menu d-flex align-items-center">

                    <img src="{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}" style="border: 1px solid #cccccc; border-radius: 5px; width:30px; height: auto; float: left; margin-right: 15px; " >
                    {{ Auth::user()->name }}
                <button type="button" class="nav-link ml-10"><a href="#"><i class="ik ik-home"></a></i></button>

                <button type="button" class="nav-link ml-10">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ik ik-log-out">
                        </i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </button>


            </div>
        </div>
    </div>
</header>