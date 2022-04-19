<div>
    <aside class="sidebar-nav-wrapper">
        <div class="navbar-logo">
            <a class="text-decoration-none text-dark nav-link fs-4" href="index.html">
                <img src="{{ asset('images/logoalfa.png') }}" alt="logo" width="75" />
                <span>Al Musyaffa</span>
            </a>
        </div>
        <nav class="sidebar-nav">
            <ul>
                @foreach ($headers as $header)
                    @role($header->name)
                        <span class="divider mt-3 ">
                            <h4>{{ $header->name }}</h4>
                        </span>
                        @foreach ($header->menus as $menu)
                            @if ($menu->subMenus->count() > 0)
                                <li
                                    class="nav-item nav-item-has-children 
                                    {{ Request::routeIs($menu->subMenus->map(function ($item) {return $item->route;})->all())? 'active': '' }}
                                    ">
                                    <a href="#0" class="collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#{{ str_replace(' ', '', $menu->name) }}"
                                        aria-controls="{{ str_replace(' ', '', $menu->name) }}" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <i data-feather="{{ $menu->icon }}"></i>
                                        <span class="text mx-2">{{ $menu->name }}</span>
                                    </a>
                                    <ul id="{{ str_replace(' ', '', $menu->name) }}"
                                        class="{{ Request::routeIs($menu->subMenus->map(function ($item) {return $item->route;})->all())? '': 'collapse' }} 
                                        dropdown-nav">
                                        @foreach ($menu->subMenus as $subMenu)
                                            <li>
                                                <a href="{{ route($subMenu->route) }}"
                                                    class="{{ Request::routeIs($subMenu->route) ? 'active' : '' }}">
                                                    {{ $subMenu->name }} </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item {{ Request::routeIs($menu->route) ? 'active' : '' }}">
                                    <a href="{{ route($menu->route) }}">
                                        <i data-feather="{{ $menu->icon }}"></i>
                                        <span class="text mx-2">
                                            {{ $menu->name }}
                                        </span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endrole
                @endforeach
            </ul>
        </nav>
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

</div>
