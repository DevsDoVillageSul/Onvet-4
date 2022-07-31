@if($configData["mainLayoutType"] === 'horizontal' && isset($configData["mainLayoutType"]))
<nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center  {{ $configData['navbarColor'] }}" data-nav="brand-center">
  <div class="navbar-header d-xl-block d-none bg-primary">
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="navbar-brand" href="{{url('/')}}">
            <span class="brand-logo">
            </span>
        </a>
      </li>
    </ul>
  </div>
  @else
  <nav class="header-navbar navbar navbar-expand-lg bg-primary align-items-center {{ $configData['navbarClass'] }} navbar-light navbar-shadow {{ $configData['navbarColor'] }}">
    @endif
    <div class="navbar-container back d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
          <ul class="nav navbar-nav d-xl-none">
            {{-- <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
          </ul>
          <ul class="nav navbar-nav bookmark-icons">
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('app/email')}}" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon" data-feather="mail"></i></a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('app/chat')}}" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon" data-feather="message-square"></i></a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('app/calendar')}}" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon" data-feather="calendar"></i></a></li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{url('app/todo')}}" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon" data-feather="check-square"></i></a></li>
        <!--   <li class="nav-item d-none d-lg-block">O que podemos colocar aqui??</li> -->
          </ul> --}}
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
          <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="{{($configData['theme'] === 'dark') ? 'sun' : 'moon' }}"></i></a></li>
        <li class="nav-item dropdown dropdown-user">
          <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="user-nav d-sm-flex d-none">
              
              <span class="user-name">Fazenda Santa América</span>
            </div>
            <span class="avatar">
              <img class="round" src="{{asset('/img/vaquinhas3.jpg')}}" alt="{{ Auth::user()->name }}" height="40" width="40">
            </span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
