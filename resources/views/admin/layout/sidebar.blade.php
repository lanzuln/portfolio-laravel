@php
   $user = \app\Models\User::first();
@endphp


<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto"></div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('backend/assets/img/avatar/avatar-1.png') }}"
                    class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{$user->name}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <div class="dropdown-divider"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" onclick="event.preventDefault();
                    this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>



            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Admin panel</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item  {{ setActive(['dashboard']) }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Section</li>

            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blak Page</span></a></li> --}}
            <li class="nav-item dropdown {{ setActive(['hero.*', 'typer-title.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Hero</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setActive(['hero.*']) }}"><a class="nav-link" href="{{ route('hero.index') }}">Hero section</a></li>
                    <li class="{{ setActive(['typer-title.*']) }}"><a class="nav-link" href="{{ route('typer-title.index') }}">Typewritter Text</a></li>

                </ul>
            </li>

            <li class="nav-item dropdown {{ setActive(['service.*']) }}">
                <a href="{{ route('service.index') }}" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Services</span></a>
            </li>
            <li class="nav-item dropdown {{ setActive(['about.*']) }}">
                <a href="{{ route('about.index') }}" class="nav-link"><i class="fas fa-columns"></i>
                    <span>About</span></a>
            </li>
            <li class="nav-item dropdown {{ setActive(['category.*', 'portfolio-item.*','portfolio-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Portfolio</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setActive(['category.*']) }}"><a class="nav-link" href="{{ route('category.index') }}">Category</a></li>
                    <li class="{{ setActive(['portfolio-item.*']) }}"><a class="nav-link" href="{{ route('portfolio-item.index') }}">Portfolio Item</a></li>
                    <li class="{{ setActive(['portfolio-setting.*']) }}"><a class="nav-link" href="{{ route('portfolio-setting.index') }}">Section setting</a></li>

                </ul>
            </li>

            <li class="nav-item dropdown  {{ setActive(['skill.*', 'skill-item.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Skill</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setActive(['skill.*']) }}"><a class="nav-link" href="{{ route('skill.index') }}">skill setting</a></li>
                    <li class="{{ setActive(['skill-item.*']) }}"><a class="nav-link" href="{{ route('skill-item.index') }}">skill Item</a></li>

                </ul>
            </li>
            <li class="nav-item {{ setActive(['experience.*']) }}">
                <a href="{{ route('experience.index') }}" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Experience</span></a>
            </li>
            <li class="nav-item dropdown  {{ setActive(['feedback.*', 'feedback-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Feedback</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setActive(['feedback.*']) }}"><a class="nav-link" href="{{ route('feedback.index') }}">Feedbacks</a></li>
                    <li class="{{ setActive(['feedback-setting.*']) }}"><a class="nav-link" href="{{ route('feedback-setting.index') }}">Feedbacks setting</a></li>

                </ul>
            </li>
            <li class="nav-item dropdown {{ setActive(['blog-category.*','blog-item.*','blog-header.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Blog</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setActive(['blog-category.*']) }}"><a class="nav-link" href="{{ route('blog-category.index') }}">Category</a></li>
                    <li class="{{ setActive(['blog-item.*']) }}"><a class="nav-link" href="{{ route('blog-item.index') }}">Blog list</a></li>
                    <li class="{{ setActive(['blog-header.*']) }}"><a class="nav-link" href="{{ route('blog-header.index') }}">Blog setting</a></li>

                </ul>
            </li>
            <li class="nav-item dropdown {{ setActive(['contact-header.*']) }}">
                <a href="{{ route('contact-header.index') }}" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Contact</span></a>
            </li>
            <li
                class="nav-item dropdown {{ setActive(['social.*', 'footer-info.*', 'footer-contact.*', 'usefull-link.*', 'help.index']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Footer</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{ setActive(['social.*']) }}"><a class="nav-link"
                            href="{{ route('social.index') }}">Social</a></li>
                    <li class="{{ setActive(['footer-info.*']) }}"><a class="nav-link"
                            href="{{ route('footer-info.index') }}">Footer Information</a></li>
                    <li class="{{ setActive(['footer-contact.*']) }}"><a class="nav-link"
                            href="{{ route('footer-contact.index') }}">Footer contact</a></li>
                    <li class="{{ setActive(['usefull-link.*']) }}"><a class="nav-link"
                            href="{{ route('usefull-link.index') }}">Footer usefull link</a></li>
                    <li class="{{ setActive(['help.index']) }}"><a class="nav-link"
                            href="{{ route('help.index') }}">Footer Help</a></li>
                </ul>
            </li>
            <li class="menu-header">Setting</li>
            {{-- setting --}}
            <li class="nav-item {{ setActive(['setting']) }}">
                <a href="{{ route('setting') }}" class="nav-link"><i class="fas fa-columns"></i>
                    <span>Setting</span></a>
            </li>
        </ul>
    </aside>
</div>
