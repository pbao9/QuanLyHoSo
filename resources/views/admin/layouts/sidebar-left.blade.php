<link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
<!-- Sidebar -->
<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <x-link :href="route('admin.dashboard')">
                <img src="{{ asset(config('custom.images.logo')) }}" alt="Bệnh viện thống nhất"
                    class="navbar-brand-image">
            </x-link>
        </h1>
        <div class="navbar-nav flex-row d-lg-none">
            @include('admin.layouts.partials.account')
        </div>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                @foreach ($menu as $item)
                    @if (auth('admin')->user()->checkPermissions($item['permissions']) || in_array('mevivuDev', $item['permissions']))
                        <li @class(['nav-item', 'dropdown' => count($item['sub']) > 0])>
                            <x-admin-item-link-sidebar-left class="nav-link" :href="$routeName($item['routeName'], $item['param'] ?? [])" :dropdown="count($item['sub']) > 0 ? true : false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    {!! __($item['icon']) !!}
                                </span>
                                <span class="nav-link-title">
                                    {{ __($item['title']) }}
                                </span>
                            </x-admin-item-link-sidebar-left>
                            @if (count($item['sub']))
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
                                            @foreach ($item['sub'] as $item)
                                                @if (auth('admin')->user()->checkPermissions($item['permissions']) || in_array('mevivuDev', $item['permissions']))
                                                    <x-admin-item-link-sidebar-left class="dropdown-item"
                                                        :href="$routeName($item['routeName'], $item['param'] ?? [])">
                                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                            {!! __($item['icon']) !!}
                                                        </span>
                                                        <span class="nav-link-title">
                                                            {{ __($item['title']) }}
                                                        </span>
                                                    </x-admin-item-link-sidebar-left>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</aside>
