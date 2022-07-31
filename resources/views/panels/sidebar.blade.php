@php
$configData = Helper::applClasses();
@endphp
<div class="main-menu menu-fixed {{ $configData['theme'] === 'dark' ? 'menu-dark' : 'menu-light' }} menu-accordion menu-shadow"
    data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <img src="{{ asset('images\logo\on_vet_transp_2.png') }}" width="70px">
                <a class="navbar-brand" href="{{ url('/') }}">


                </a>
            </li>

            
            {{-- <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i>
                </a>
            </li> --}}
        </ul>
    </div>
    <hr>
    <ul class="nav ml-auto">
        <div class="user-nav d-sm-flex d-none">

            <li class="nav-item dropdown dropdown-user">
                <a class="nav nav-link dropdown-toggle" id="dropdown-user" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">&nbsp &nbsp
                    <span class="avatar">
                        <img class="round" src="{{ asset('img/gb.jpeg') }}"
                            alt="{{ Auth::user()->name }}" height="40" width="40">
                        <span class="avatar-status-online"></span>
                    </span>
                    <span class="user-name font-weight-bolder">
                        &nbsp{{ explode(' ', Auth::user()->name)[0] }}
                    </span>
                </a>
        </div>

        </li>
    </ul>
    <hr>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{-- // Itens de Menu, que teria que pegar da Sessão do Usuário --}}
            @php
                $menuData = \Session::get('user');
            @endphp
            @if (isset($menuData))
                @foreach ($menuData->menu as $menu)
                    @if (isset($menu->navheader))
                        <li class="navigation-header">
                            <span>{{ __('locale.' . $menu->navheader) }}</span>
                            <i data-feather="more-horizontal"></i>
                        </li>
                    @else
                        @php
                            $custom_classes = '';
                            if (isset($menu->classlist)) {
                                $custom_classes = $menu->classlist;
                            }
                        @endphp
                        <li
                            class="nav-item {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }} {{ $custom_classes }}">
                            <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                                class="d-flex align-items-center"
                                target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                                <i data-feather="{{ $menu->icon }}"></i>
                                <span class="menu-title text-truncate">{{ __('locale.' . $menu->name) }}</span>
                                @if (isset($menu->badge))
                                    <?php $badgeClasses = 'badge badge-pill badge-light-primary ml-auto mr-1'; ?>
                                    <span
                                        class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }} ">{{ $menu->badge }}</span>
                                @endif
                            </a>
                            @if (isset($menu->submenu))
                                @include('tema/panels/submenu', ['menu' => $menu->submenu])
                            @endif
                        </li>
                    @endif
                @endforeach
            @endif
            {{-- Foreach menu item ends --}}
            <hr>
            <div class="shadow-bottom" >
        </ul>
        <ul class="justify-content-center nav nav-pills" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item">
            
                <a class="dropdown-item nav-link" href="{{ url('logout') }}">
                
                    <i class="mr-60" data-feather="log-out"></i>Sair 
                </a>
                
            </li>
        </ul>

    </div>


</div>
<!-- END: Main Menu-->
