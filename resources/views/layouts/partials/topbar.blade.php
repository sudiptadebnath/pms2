
<header class="navbar navbar-expand-lg navbar-dark bg-primary px-3">
@if (userLogged())
  <button class="btn btn-primary d-sm-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">
	<i class="bi bi-list"></i>
  </button>
@endif

  <a class="navbar-brand text-white d-flex align-items-center gap-2" href="#">
    <img src={{asset("resources/img/logo.png")}} alt="logo" height="32">
    {{ env('APP_TITLE', 'pms') }}
  </a>


  @if (userLogged())
    <x-cmntbtn id="1" icon="volume-up" title="Chat - Broadcast to all" style="warning" style2="muted" /> 

	<div class="ms-auto dropdown d-flex align-items-center gap-2">
    <x-cmntbtn id="2" icon="chat-dots" title="Chat - Individual" style="info" style2="black" uid="{{ getUsrProp('id') }}" /> 

	<a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
	  <i class="bi bi-person-circle me-2"></i> {{ getUsrProp("uid") ?? 'User' }}
	</a>
	<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
	  <li><a class="dropdown-item" href="{{ url('/user/profile') }}">
		<i class="bi bi-gear me-2"></i>Settings</a></li>
	  <li><hr class="dropdown-divider"></li>
	  <li><a class="dropdown-item" href="{{ url('/user/logout') }}">
		<i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
	</ul>
  </div> 
@endif

</header>