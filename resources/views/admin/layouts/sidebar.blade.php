
<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">{{ env('APP_NAME') }}</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item @yield('dashboard')">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="feather icon-home"></i>
                    <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>
            <li class=" navigation-header"><span>Apps</span></li>
            <li class=" nav-item @yield('categories')">
                <a href="{{ route('admin.categories.index') }}">
                    <i class="feather icon-package"></i>
                    <span class="menu-title" data-i18n="Category">Categories</span>
                </a>
            </li>
            <li class=" nav-item @yield('project')">
                <a href="{{ route('admin.project.index') }}">
                    <i class="feather icon-package"></i>
                    <span class="menu-title" data-i18n="Project">Projects</span>
                </a>
            </li>
            <li class=" nav-item @yield('tools')">
                <a href="{{ route('admin.tool.index') }}">
                    <i class="feather icon-tool"></i>
                    <span class="menu-title" data-i18n="Tool">Tools</span>
                </a>
            </li>
            <li class=" nav-item @yield('skills')">
                <a href="{{ route('admin.skill.index') }}">
                    <i class="feather icon-star"></i>
                    <span class="menu-title" data-i18n="Skill">Skills</span>
                </a>
            </li>
            <li class=" nav-item @yield('personal-qualities')">
                <a href="{{ route('admin.personal-quality.index') }}">
                    <i class="feather icon-user"></i>
                    <span class="menu-title" data-i18n="PersonalQuality">Personal Qualities</span>
                </a>
            </li>
            <li class=" nav-item @yield('educations')">
                <a href="{{ route('admin.education.index') }}">
                    <i class="feather icon-book"></i>
                    <span class="menu-title" data-i18n="Education">Educations</span>
                </a>
            </li>
            <li class=" nav-item @yield('blogs')">
                <a href="{{ route('admin.blog.index') }}">
                    <i class="feather icon-file-text"></i>
                    <span class="menu-title" data-i18n="Blog">Blog</span>
                </a>
            </li>
            <li class=" nav-item @yield('ai-providers')">
                <a href="{{ route('admin.ai-provider.index') }}">
                    <i class="feather icon-cpu"></i>
                    <span class="menu-title" data-i18n="AiProvider">AI Providers</span>
                </a>
            </li>
            <li class=" nav-item @yield('visitors')">
                <a href="{{ route('admin.visitors') }}">
                    <i class="feather icon-user"></i>
                    <span class="menu-title" data-i18n="Project">Visitors</span>
                </a>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
