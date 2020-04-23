<div class="sidebar-menu">
    <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span>
        <!--<img id="logo" src="" alt="Logo"/>-->
    </a> </div>
  <div class="menu">
    <ul id="menu" >
      <li id="menu-home"><a href="#"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
      <li><a href="#"><i class="fa fa-bar-chart"></i><span>Campaigns</span><span class="fa fa-angle-right" style="float: right"></span></a>
        <ul>
          <li><a href="{{ route('campaigns.create') }}">New Campaign</a></li>
          <li><a href="{{ route('campaigns.index') }}">Manage Campaigns</a></li>
        </ul>
      </li>
      <li id="menu-comunicacao" ><a href="{{ route('donations.index') }}"><i class="fa fa-book nav_icon"></i><span>Donations</span></a></li>
       <li><a href="#"><i class="fa fa-cogs"></i><span>Settings</span><span class="fa fa-angle-right" style="float: right"></span></a>
            <ul id="menu-academico-sub" >
              <li id="menu-academico-avaliacoes" ><a href="{{ route('partners.index') }}">Partners</a></li>
              <li id="menu-academico-avaliacoes" ><a href="{{ route('slideshow.index') }}">Slideshow</a></li>
              <li id="menu-academico-avaliacoes" ><a href="{{ route('homepage') }}">Homepage</a></li>
              <li id="menu-academico-avaliacoes" ><a href="{{ route('settings.about') }}">About/Contact Page</a></li>
              {{-- <li id="menu-academico-boletim" ><a href="#">Payment Gateway</a></li> --}}
           </ul>
       </li>
    </ul>
  </div>
</div>
<div class="clearfix"> </div>
</div>
