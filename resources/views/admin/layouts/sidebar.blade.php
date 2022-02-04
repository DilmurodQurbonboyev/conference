<aside class="main-sidebar sidebar-{{ Auth::user()->dark_mode == 0 ? 'light' : 'dark' }}-primary elevation-1">
    <a class="brand-link">
        <img width="90%" src="{{ asset('img/uzinfocom.png') }}" alt="">
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/noImage.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <span class="d-block">{{ Str::ucfirst(Auth::user()->name) }}</span>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin') }}" class="nav-link {{ request()->routeIs('admin') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <p>{{ tr('Dashboard') }}</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('menus.*', 'menus-category.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('menus.*', 'menus-category.*') ? 'active' : '' }}">
                        <i class="fab fa-elementor"></i>
                        <p>{{ tr('Menus') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @can('menus-category.index')
                            <a href="{{ route('menus-category.index') }}"
                                class="nav-link {{ request()->routeIs('menus-category.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>{{ tr('Menu Categories') }}</p>
                            </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('menus.index')
                            <a href="{{ route('menus.index') }}"
                                class="nav-link {{ request()->routeIs('menus.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>{{ tr('Menus') }}</p>
                            </a>
                            @endcan
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('news.*', 'news-category.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('news.*', 'news-category.*') ? 'active' : '' }}">
                        <i class="far fa-newspaper"></i>
                        <p>
                            {{ tr('News') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @can('news-category.index')
                            <a href="{{ route('news-category.index') }}"
                                class="nav-link {{ request()->routeIs('news-category.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                {{ tr('News Categories') }}</p>
                            </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('news.index')
                            <a href="{{ route('news.index') }}"
                                class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>{{ tr('News') }}</p>
                            </a>
                            @endcan
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('pages.*', 'pages-category.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('pages.*', 'pages-category.*') ? 'active' : '' }}">
                        <i class="fas fa-file-alt"></i>
                        <p><i class="fas fa-angle-left right"></i>
                            {{ tr('Pages') }}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @can('pages-category.index')
                            <a href="{{ route('pages-category.index') }}"
                                class="nav-link {{ request()->routeIs('pages-category.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>{{ tr('Pages Categories') }}</p>
                            </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('pages.index')
                            <a href="{{ route('pages.index') }}"
                                class="nav-link {{ request()->routeIs('pages.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>{{ tr('Pages') }}</p>
                            </a>
                            @endcan
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('useful.*', 'useful-category.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('useful.*', 'useful-category.*') ? 'active' : '' }}">
                        <i class="fas fa-tv"></i>
                        <p>
                            <i class="fas fa-angle-left right"></i>
                            {{ tr('Useful') }}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @can('useful-category.index')
                            <a href="{{ route('useful-category.index') }}"
                                class="nav-link {{ request()->routeIs('useful-category.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>{{ tr('Useful Categories') }}</p>
                            </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('useful.index')
                            <a href="{{ route('useful.index') }}"
                                class="nav-link {{ request()->routeIs('useful.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>{{ tr('Useful') }}</p>
                            </a>
                            @endcan
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('photos.*', 'photos-category.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('photos.*', 'photos-category.*') ? 'active' : '' }}">
                        <i class="fas fa-camera"></i>
                        <p>
                            <i class="fas fa-angle-left right"></i>
                            {{ tr('Photos') }}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @can('photos-category.index')
                            <a href="{{ route('photos-category.index') }}"
                                class="nav-link {{ request()->routeIs('photos-category.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>{{ tr('Photos Categories') }}</p>
                            </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('photos.index')
                            <a href="{{ route('photos.index') }}"
                                class="nav-link {{ request()->routeIs('photos.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>{{ tr('Photos') }}</p>
                            </a>
                            @endcan
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('videos.*', 'videos-category.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('videos.*', 'videos-category.*') ? 'active' : '' }}">
                        <i class="fas fa-photo-video"></i>
                        <p>
                            {{ tr('Video Gallery') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @can('videos-category.index')
                            <a href="{{ route('videos-category.index') }}"
                                class="nav-link {{ request()->routeIs('videos-category.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>{{ tr('Videos Categories') }}</p>
                            </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('videos.index')
                            <a href="{{ route('videos.index') }}"
                                class="nav-link {{ request()->routeIs('videos.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>{{ tr('Video Gallery') }}</p>
                            </a>
                            @endcan
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ request()->routeIs('managements.*', 'managements-category.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('managements.*', 'managements-category.*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        <p>
                            {{ tr('Managements') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @can('managements-category.index')
                            <a href="{{ route('managements-category.index') }}"
                                class="nav-link {{ request()->routeIs('managements-category.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>{{ tr('Management Categories') }}</p>
                            </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('managements.index')
                            <a href="{{ route('managements.index') }}"
                                class="nav-link {{ request()->routeIs('managements.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>{{ tr('Managements') }}</p>
                            </a>
                            @endcan
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    @can('messages.index')
                    <a href="{{ route('messages.index') }}"
                        class="nav-link {{ request()->routeIs('messages.*') ? 'active' : '' }}">
                        <i class="fas fa-language"></i>
                        <p>{{ tr('Messages') }}</p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('logs.index')
                    <a href="{{ route('logs.index') }}"
                        class="nav-link {{ request()->routeIs('logs.*') ? 'active' : '' }}">
                        <i class="fas fa-book"></i>
                        <p>{{ tr('Logs') }}</p>
                    </a>
                    @endcan
                </li>
                <li class="nav-item {{ request()->routeIs('appeals.*', 'offline.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('appeals.*', 'offline.*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        <p>
                            {{ tr('Registers') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('appeals.index') }}"
                                class="nav-link {{ request()->routeIs('appeals.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>{{ tr('Online') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('offline.index') }}"
                                class="nav-link {{ request()->routeIs('offline.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>{{ tr('Offline') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->routeIs('users.*', 'roles.*', 'permissions.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('users.*', 'roles.*', 'permissions.*') ? 'active' : '' }}">
                        <i class="fas fa-user-lock"></i>
                        <p>
                            {{ tr('Super Admin') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            @can('users.index')
                            <a href="{{ route('users.index') }}"
                                class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>{{ tr('Users') }}</p>
                            </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('roles.index')
                            <a href="{{ route('roles.index') }}"
                                class="nav-link {{ request()->routeIs('roles.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                {{ tr('Roles') }}</p>
                            </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('permissions.index')
                            <a href="{{ route('permissions.index') }}"
                                class="nav-link {{ request()->routeIs('permissions.*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-primary"></i>
                                <p>{{ tr('Permissions') }}</p>
                            </a>
                            @endcan
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
