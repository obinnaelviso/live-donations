<div class="header-main fixed">
    <div class="header-left">
            <div class="logo-name">
                     <a href="index.html"> <h1 style="font-size: 18px">Life Saving Foundation</h1>
                    <!--<img id="logo" src="" alt="Logo"/>-->
                  </a>
            </div>
         </div>
         <div class="header-right">
            <!--notification menu end -->
            <div class="profile_details">
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf
                    <a href="#" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        <div class="profile_img">
                            <div class="user-name">
                                <p>Logout  <i class="fa fa-sign-out"></i></p>
                            </div>
                        </div>
                    </a>
                </form>
            </div>
        </div>
</div>
