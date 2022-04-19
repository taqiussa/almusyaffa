<aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
        <a class="text-decoration-none text-dark nav-link fs-4" href="index.html">
            <img src="{{ asset('images/logo bunder1.1.png') }}" alt="logo" width="75"/>
            <span>FITER BARBER</span>
        </a>
    </div>
    <nav class="sidebar-nav">
        <ul>
            @foreach ($headers as $header)
            <span class="divider mt-3 ">
                <h4>{{ $header->name }}</h4>
            </span>
                @foreach ($header->menus as $menu)
                    @if ($menu->subMenus->count() > 0)
                        <li class="nav-item nav-item-has-children 
                        {{ Request::routeIs($menu->subMenus->map(function ($item) { return $item->route; })->all()) ? 'active' : '' }}
                        ">
                            <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#{{ str_replace(' ','',$menu->name) }}"
                                aria-controls="{{ str_replace(' ','',$menu->name) }}" aria-expanded="false" aria-label="Toggle navigation">
                                <i data-feather="{{ $menu->icon }}"></i>
                                <span class="text mx-1">{{ $menu->name }}</span>
                            </a>
                            <ul id="{{ str_replace(' ','',$menu->name) }}" 
                                class="{{ Request::routeIs($menu->subMenus->map(function ($item) { return $item->route; })->all()) ? '' : 'collapse' }} 
                                dropdown-nav">
                                @foreach ($menu->subMenus as $subMenu)
                                    <li>
                                        <a href="{{ route($subMenu->route) }}" class="{{ Request::routeIs($subMenu->route) ? 'active' : '' }}"> {{ $subMenu->name }} </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                    <li class="nav-item {{ Request::routeIs($menu->route) ? 'active' : '' }}">
                        <a href="{{ route($menu->route) }}">
                            <span class="icon">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.0001 3.66675C11.9725 3.66675 12.9052 4.05306 13.5928 4.74069C14.2804 5.42832 14.6667 6.36095 14.6667 7.33341C14.6667 8.30587 14.2804 9.23851 13.5928 9.92614C12.9052 10.6138 11.9725 11.0001 11.0001 11.0001C10.0276 11.0001 9.09499 10.6138 8.40736 9.92614C7.71972 9.23851 7.33341 8.30587 7.33341 7.33341C7.33341 6.36095 7.71972 5.42832 8.40736 4.74069C9.09499 4.05306 10.0276 3.66675 11.0001 3.66675ZM11.0001 5.50008C10.5139 5.50008 10.0475 5.69324 9.70372 6.03705C9.3599 6.38087 9.16675 6.84718 9.16675 7.33341C9.16675 7.81964 9.3599 8.28596 9.70372 8.62978C10.0475 8.97359 10.5139 9.16675 11.0001 9.16675C11.4863 9.16675 11.9526 8.97359 12.2964 8.62978C12.6403 8.28596 12.8334 7.81964 12.8334 7.33341C12.8334 6.84718 12.6403 6.38087 12.2964 6.03705C11.9526 5.69324 11.4863 5.50008 11.0001 5.50008ZM11.0001 11.9167C13.4476 11.9167 18.3334 13.1359 18.3334 15.5834V18.3334H3.66675V15.5834C3.66675 13.1359 8.55258 11.9167 11.0001 11.9167ZM11.0001 13.6584C8.27758 13.6584 5.40841 14.9967 5.40841 15.5834V16.5917H16.5917V15.5834C16.5917 14.9967 13.7226 13.6584 11.0001 13.6584Z" />
                                </svg>
                            </span>
                            <span class="text">
                                {{ $menu->name }}
                            </span>
                        </a>
                    </li>
                    @endif
                @endforeach
            @endforeach
        </ul>
    </nav>
</aside>
<div class="overlay"></div>
<!-- ======== sidebar-nav end =========== -->
