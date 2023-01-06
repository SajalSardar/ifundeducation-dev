<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('backend/css/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true"
                data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <!--begin::Brand-->
                <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                    <!--begin::Logo-->
                    <a href="index.html">
                        <img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-15px logo" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Aside toggler-->
                    <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                        data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                        data-kt-toggle-name="aside-minimize">
                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-double-left.svg-->
                        <span class="svg-icon svg-icon-1 rotate-180">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                                    <path
                                        d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.5"
                                        transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Aside toggler-->
                </div>
                <!--end::Brand-->
                <!--begin::Aside menu-->
                <div class="aside-menu flex-column-fluid">
                    <!--begin::Aside Menu-->
                    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
                        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                        data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
                        <!--begin::Menu-->
                        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                            id="#kt_aside_menu" data-kt-menu="true">
                            <div class="menu-item">
                                <a class="menu-link active" href="index.html">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotone/Design/PenAndRuller.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <path
                                                    d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                    fill="#000000" opacity="0.3" />
                                                <path
                                                    d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                    fill="#000000" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title">Dashboard</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <div class="menu-content pt-8 pb-2">
                                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Crafted</span>
                                </div>
                            </div>
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotone/Code/Compiling.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <path
                                                    d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                                    fill="#000000" opacity="0.3" />
                                                <path
                                                    d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                                    fill="#000000" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="menu-title">Pages</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion menu-active-bg">
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        <span class="menu-link">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Profile</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/profile/overview.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Overview</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/profile/projects.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Projects</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/profile/campaigns.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Campaigns</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/profile/documents.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Documents</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/profile/connections.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Connections</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/profile/activity.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Activity</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        <span class="menu-link">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Projects</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/projects/list.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">My Projects</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/projects/project.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">View Project</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/projects/targets.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Targets</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/projects/budget.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Budget</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/projects/users.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Users</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/projects/files.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Files</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/projects/activity.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Activity</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/projects/settings.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Settings</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        <span class="menu-link">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Wizards</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/wizards/horizontal.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Horizontal</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/wizards/vertical.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Vertical</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        <span class="menu-link">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Search</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/search/horizontal.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Horizontal</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/search/vertical.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Vertical</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        <span class="menu-link">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Blog</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/blog/home.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Blog Home</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/blog/post.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Blog Post</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        <span class="menu-link">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Company</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/company/about.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">About Us</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/company/pricing.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Pricing</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/company/contact.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Contact Us</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/company/team.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Our Team</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/company/licenses.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Licenses</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/company/sitemap.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Sitemap</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        <span class="menu-link">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Careers</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/careers/list.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Careers List</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/careers/apply.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Careers Apply</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        <span class="menu-link">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">FAQ</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/faq/classic.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Classic</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link" href="pages/faq/extended.html">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Extended</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--end::Menu-->
                    </div>
                </div>
                <!--end::Aside menu-->

            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" style="" class="header align-items-stretch">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <!--begin::Aside mobile toggle-->
                        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                                id="kt_aside_mobile_toggle">
                                <!--begin::Svg Icon | path: icons/duotone/Text/Menu.svg-->
                                <span class="svg-icon svg-icon-2x mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <rect fill="#000000" x="4" y="5" width="16"
                                                height="3" rx="1.5" />
                                            <path
                                                d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                        </div>
                        <!--end::Aside mobile toggle-->
                        <!--begin::Mobile logo-->
                        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                            <a href="index.html" class="d-lg-none">
                                <img alt="Logo" src="assets/media/logos/logo-3.svg" class="h-30px" />
                            </a>
                        </div>
                        <!--end::Mobile logo-->
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                            <!--begin::Navbar-->
                            <div class="d-flex align-items-stretch" id="kt_header_nav">
                                <!--begin::Menu wrapper-->
                                <div class="header-menu align-items-stretch" data-kt-drawer="true"
                                    data-kt-drawer-name="header-menu"
                                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                                    data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                                    data-kt-drawer-direction="end"
                                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                                    data-kt-swapper-mode="prepend"
                                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                                    <!--begin::Menu-->
                                    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                                        id="#kt_header_menu" data-kt-menu="true">
                                        <div class="menu-item me-lg-1">
                                            <a class="menu-link active py-3" href="index.html">
                                                <span class="menu-title">Dashboard</span>
                                            </a>
                                        </div>
                                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                                            class="menu-item menu-lg-down-accordion me-lg-1">
                                            <span class="menu-link py-3">
                                                <span class="menu-title">Crafted</span>
                                                <span class="menu-arrow d-lg-none"></span>
                                            </span>
                                            <div
                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                    data-kt-menu-placement="right-start"
                                                    class="menu-item menu-lg-down-accordion">
                                                    <span class="menu-link py-3">
                                                        <span class="menu-icon">
                                                            <!--begin::Svg Icon | path: icons/duotone/Code/Compiling.svg-->
                                                            <span class="svg-icon svg-icon-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                    height="24px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <path
                                                                        d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                                                        fill="#000000" opacity="0.3" />
                                                                    <path
                                                                        d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                                                        fill="#000000" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <span class="menu-title">Pages</span>
                                                        <span class="menu-arrow"></span>
                                                    </span>
                                                    <div
                                                        class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                            data-kt-menu-placement="right-start"
                                                            class="menu-item menu-lg-down-accordion">
                                                            <span class="menu-link py-3">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Profile</span>
                                                                <span class="menu-arrow"></span>
                                                            </span>
                                                            <div
                                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/profile/overview.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Overview</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/profile/projects.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Projects</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/profile/campaigns.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Campaigns</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/profile/documents.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Documents</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/profile/connections.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Connections</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/profile/activity.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Activity</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                            data-kt-menu-placement="right-start"
                                                            class="menu-item menu-lg-down-accordion">
                                                            <span class="menu-link py-3">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Projects</span>
                                                                <span class="menu-arrow"></span>
                                                            </span>
                                                            <div
                                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/projects/list.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">My Projects</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/projects/project.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">View Project</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/projects/targets.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Targets</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/projects/budget.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Budget</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/projects/users.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Users</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/projects/files.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Files</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/projects/activity.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Activity</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/projects/settings.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Settings</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                            data-kt-menu-placement="right-start"
                                                            class="menu-item menu-lg-down-accordion">
                                                            <span class="menu-link py-3">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Wizards</span>
                                                                <span class="menu-arrow"></span>
                                                            </span>
                                                            <div
                                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/wizards/horizontal.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Horizontal</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/wizards/vertical.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Vertical</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                            data-kt-menu-placement="right-start"
                                                            class="menu-item menu-lg-down-accordion">
                                                            <span class="menu-link py-3">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Search</span>
                                                                <span class="menu-arrow"></span>
                                                            </span>
                                                            <div
                                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/search/horizontal.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Horizontal</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/search/vertical.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Vertical</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                            data-kt-menu-placement="right-start"
                                                            class="menu-item menu-lg-down-accordion">
                                                            <span class="menu-link py-3">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Blog</span>
                                                                <span class="menu-arrow"></span>
                                                            </span>
                                                            <div
                                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/blog/home.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Blog Home</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/blog/post.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Blog Post</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                            data-kt-menu-placement="right-start"
                                                            class="menu-item menu-lg-down-accordion">
                                                            <span class="menu-link py-3">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Company</span>
                                                                <span class="menu-arrow"></span>
                                                            </span>
                                                            <div
                                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/company/about.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">About Us</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/company/pricing.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Pricing</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/company/contact.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Contact Us</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/company/team.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Our Team</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/company/licenses.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Licenses</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/company/sitemap.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Sitemap</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                            data-kt-menu-placement="right-start"
                                                            class="menu-item menu-lg-down-accordion">
                                                            <span class="menu-link py-3">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Careers</span>
                                                                <span class="menu-arrow"></span>
                                                            </span>
                                                            <div
                                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/careers/list.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Careers List</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/careers/apply.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Careers Apply</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                            data-kt-menu-placement="right-start"
                                                            class="menu-item menu-lg-down-accordion">
                                                            <span class="menu-link py-3">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">FAQ</span>
                                                                <span class="menu-arrow"></span>
                                                            </span>
                                                            <div
                                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/faq/classic.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Classic</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="pages/faq/extended.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Extended</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                    data-kt-menu-placement="right-start"
                                                    class="menu-item menu-lg-down-accordion">
                                                    <span class="menu-link py-3">
                                                        <span class="menu-icon">
                                                            <!--begin::Svg Icon | path: icons/duotone/General/User.svg-->
                                                            <span class="svg-icon svg-icon-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="24px" height="24px" viewBox="0 0 24 24"
                                                                    version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                                        <path
                                                                            d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                                            fill="#000000" fill-rule="nonzero"
                                                                            opacity="0.3" />
                                                                        <path
                                                                            d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                                            fill="#000000" fill-rule="nonzero" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <span class="menu-title">Account</span>
                                                        <span class="menu-arrow"></span>
                                                    </span>
                                                    <div
                                                        class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                        <div class="menu-item">
                                                            <a class="menu-link py-3" href="account/overview.html">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Overview</span>
                                                            </a>
                                                        </div>
                                                        <div class="menu-item">
                                                            <a class="menu-link py-3" href="account/settings.html">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Settings</span>
                                                            </a>
                                                        </div>
                                                        <div class="menu-item">
                                                            <a class="menu-link py-3" href="account/security.html">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Security</span>
                                                            </a>
                                                        </div>
                                                        <div class="menu-item">
                                                            <a class="menu-link py-3" href="account/billing.html">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Billing</span>
                                                            </a>
                                                        </div>
                                                        <div class="menu-item">
                                                            <a class="menu-link py-3" href="account/statements.html">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Statements</span>
                                                            </a>
                                                        </div>
                                                        <div class="menu-item">
                                                            <a class="menu-link py-3" href="account/referrals.html">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Referrals</span>
                                                            </a>
                                                        </div>
                                                        <div class="menu-item">
                                                            <a class="menu-link py-3" href="account/api-keys.html">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">API Keys</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                    data-kt-menu-placement="right-start"
                                                    class="menu-item menu-lg-down-accordion">
                                                    <span class="menu-link py-3">
                                                        <span class="menu-icon">
                                                            <!--begin::Svg Icon | path: icons/duotone/Interface/Lock.svg-->
                                                            <span class="svg-icon svg-icon-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24"
                                                                    fill="none">
                                                                    <path opacity="0.25" fill-rule="evenodd"
                                                                        clip-rule="evenodd"
                                                                        d="M3.11117 13.2288C3.27137 11.0124 5.01376 9.29156 7.2315 9.15059C8.55778 9.06629 10.1795 9 12 9C13.8205 9 15.4422 9.06629 16.7685 9.15059C18.9862 9.29156 20.7286 11.0124 20.8888 13.2288C20.9535 14.1234 21 15.085 21 16C21 16.915 20.9535 17.8766 20.8888 18.7712C20.7286 20.9876 18.9862 22.7084 16.7685 22.8494C15.4422 22.9337 13.8205 23 12 23C10.1795 23 8.55778 22.9337 7.23151 22.8494C5.01376 22.7084 3.27137 20.9876 3.11118 18.7712C3.04652 17.8766 3 16.915 3 16C3 15.085 3.04652 14.1234 3.11117 13.2288Z"
                                                                        fill="#12131A" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M13 16.7324C13.5978 16.3866 14 15.7403 14 15C14 13.8954 13.1046 13 12 13C10.8954 13 10 13.8954 10 15C10 15.7403 10.4022 16.3866 11 16.7324V18C11 18.5523 11.4477 19 12 19C12.5523 19 13 18.5523 13 18V16.7324Z"
                                                                        fill="#12131A" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6V10C17 10.5523 16.5523 11 16 11C15.4477 11 15 10.5523 15 10V6C15 4.34315 13.6569 3 12 3C10.3431 3 9 4.34315 9 6V10C9 10.5523 8.55228 11 8 11C7.44772 11 7 10.5523 7 10V6Z"
                                                                        fill="#12131A" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <span class="menu-title">Authentication</span>
                                                        <span class="menu-arrow"></span>
                                                    </span>
                                                    <div
                                                        class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                            data-kt-menu-placement="right-start"
                                                            class="menu-item menu-lg-down-accordion">
                                                            <span class="menu-link py-3">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Basic Flow</span>
                                                                <span class="menu-arrow"></span>
                                                            </span>
                                                            <div
                                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/flows/basic/sign-in.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Sign-in</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/flows/basic/sign-up.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Sign-up</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/flows/basic/two-steps.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Two-steps</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/flows/basic/password-reset.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Password Reset</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/flows/basic/new-password.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">New Password</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                            data-kt-menu-placement="right-start"
                                                            class="menu-item menu-lg-down-accordion">
                                                            <span class="menu-link py-3">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Aside Flow</span>
                                                                <span class="menu-arrow"></span>
                                                            </span>
                                                            <div
                                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/flows/aside/sign-in.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Sign-in</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/flows/aside/sign-up.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Sign-up</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/flows/aside/two-steps.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Two-steps</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/flows/aside/password-reset.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Password Reset</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/flows/aside/new-password.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">New Password</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                            data-kt-menu-placement="right-start"
                                                            class="menu-item menu-lg-down-accordion">
                                                            <span class="menu-link py-3">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Dark Flow</span>
                                                                <span class="menu-arrow"></span>
                                                            </span>
                                                            <div
                                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/flows/dark/sign-in.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Sign-in</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/flows/dark/sign-up.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Sign-up</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/flows/dark/two-steps.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Two-steps</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/flows/dark/password-reset.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Password Reset</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/flows/dark/new-password.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">New Password</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                            data-kt-menu-placement="right-start"
                                                            class="menu-item menu-lg-down-accordion">
                                                            <span class="menu-link py-3">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Extended</span>
                                                                <span class="menu-arrow"></span>
                                                            </span>
                                                            <div
                                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/extended/multi-steps-sign-up.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Multi-steps
                                                                            Sign-up</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/extended/free-trial-sign-up.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Free Trial
                                                                            Sign-up</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/extended/coming-soon.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Coming Soon</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/general/welcome.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Welcome
                                                                            Message</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/general/verify-email.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Verify Email</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/general/password-confirmation.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Password
                                                                            Confirmation</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/general/deactivation.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Account
                                                                            Deactivation</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/general/error-404.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Error 404</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/general/error-500.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Error 500</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                            data-kt-menu-placement="right-start"
                                                            class="menu-item menu-lg-down-accordion">
                                                            <span class="menu-link py-3">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Email Templates</span>
                                                                <span class="menu-arrow"></span>
                                                            </span>
                                                            <div
                                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/email/verify-email.html"
                                                                        target="blank">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Verify Email</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/email/invitation.html"
                                                                        target="blank">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Account
                                                                            Invitation</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/email/password-reset.html"
                                                                        target="blank">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Password Reset</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="authentication/email/password-change.html"
                                                                        target="blank">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Password
                                                                            Changed</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                    data-kt-menu-placement="right-start"
                                                    class="menu-item menu-lg-down-accordion">
                                                    <span class="menu-link py-3">
                                                        <span class="menu-icon">
                                                            <!--begin::Svg Icon | path: icons/duotone/Design/Substract.svg-->
                                                            <span class="svg-icon svg-icon-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="24px" height="24px"
                                                                    viewBox="0 0 24 24" version="1.1">
                                                                    <path
                                                                        d="M6,9 L6,15 C6,16.6568542 7.34314575,18 9,18 L15,18 L15,18.8181818 C15,20.2324881 14.2324881,21 12.8181818,21 L5.18181818,21 C3.76751186,21 3,20.2324881 3,18.8181818 L3,11.1818182 C3,9.76751186 3.76751186,9 5.18181818,9 L6,9 Z"
                                                                        fill="#000000" fill-rule="nonzero" />
                                                                    <path
                                                                        d="M10.1818182,4 L17.8181818,4 C19.2324881,4 20,4.76751186 20,6.18181818 L20,13.8181818 C20,15.2324881 19.2324881,16 17.8181818,16 L10.1818182,16 C8.76751186,16 8,15.2324881 8,13.8181818 L8,6.18181818 C8,4.76751186 8.76751186,4 10.1818182,4 Z"
                                                                        fill="#000000" opacity="0.3" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <span class="menu-title">Modals</span>
                                                        <span class="menu-arrow"></span>
                                                    </span>
                                                    <div
                                                        class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                            data-kt-menu-placement="right-start"
                                                            class="menu-item menu-lg-down-accordion">
                                                            <span class="menu-link py-3">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">General</span>
                                                                <span class="menu-arrow"></span>
                                                            </span>
                                                            <div
                                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="modals/general/invite-friends.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Invite Friends</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="modals/general/view-users.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">View Users</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="modals/general/upgrade-plan.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Upgrade Plan</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="modals/general/share-earn.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Share &amp;
                                                                            Earn</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                            data-kt-menu-placement="right-start"
                                                            class="menu-item menu-lg-down-accordion">
                                                            <span class="menu-link py-3">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Forms</span>
                                                                <span class="menu-arrow"></span>
                                                            </span>
                                                            <div
                                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="modals/forms/new-target.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">New Target</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="modals/forms/new-card.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">New Card</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="modals/forms/new-address.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">New Address</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="modals/forms/create-api-key.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Create API Key</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                            data-kt-menu-placement="right-start"
                                                            class="menu-item menu-lg-down-accordion">
                                                            <span class="menu-link py-3">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Wizards</span>
                                                                <span class="menu-arrow"></span>
                                                            </span>
                                                            <div
                                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="modals/wizards/two-factor-authentication.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Two Factor
                                                                            Auth</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="modals/wizards/create-app.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Create App</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="modals/wizards/create-account.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Create Account</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="modals/wizards/create-project.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Create Project</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="modals/wizards/offer-a-deal.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Offer a Deal</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                            data-kt-menu-placement="right-start"
                                                            class="menu-item menu-lg-down-accordion">
                                                            <span class="menu-link py-3">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Search</span>
                                                                <span class="menu-arrow"></span>
                                                            </span>
                                                            <div
                                                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="modals/search/users.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Users</span>
                                                                    </a>
                                                                </div>
                                                                <div class="menu-item">
                                                                    <a class="menu-link py-3"
                                                                        href="modals/search/select-location.html">
                                                                        <span class="menu-bullet">
                                                                            <span class="bullet bullet-dot"></span>
                                                                        </span>
                                                                        <span class="menu-title">Select
                                                                            Location</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                    data-kt-menu-placement="right-start"
                                                    class="menu-item menu-lg-down-accordion">
                                                    <span class="menu-link py-3">
                                                        <span class="menu-icon">
                                                            <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks.svg-->
                                                            <span class="svg-icon svg-icon-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    width="24px" height="24px"
                                                                    viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1"
                                                                        fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0"
                                                                            width="24" height="24" />
                                                                        <rect fill="#000000" x="4"
                                                                            y="4" width="7"
                                                                            height="7" rx="1.5" />
                                                                        <path
                                                                            d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                                                            fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <span class="menu-title">Widgets</span>
                                                        <span class="menu-arrow"></span>
                                                    </span>
                                                    <div
                                                        class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                                        <div class="menu-item">
                                                            <a class="menu-link py-3" href="widgets/lists.html">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Lists</span>
                                                            </a>
                                                        </div>
                                                        <div class="menu-item">
                                                            <a class="menu-link py-3"
                                                                href="widgets/statistics.html">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Statistics</span>
                                                            </a>
                                                        </div>
                                                        <div class="menu-item">
                                                            <a class="menu-link py-3" href="widgets/charts.html">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Charts</span>
                                                            </a>
                                                        </div>
                                                        <div class="menu-item">
                                                            <a class="menu-link py-3" href="widgets/mixed.html">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Mixed</span>
                                                            </a>
                                                        </div>
                                                        <div class="menu-item">
                                                            <a class="menu-link py-3" href="widgets/tables.html">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Tables</span>
                                                            </a>
                                                        </div>
                                                        <div class="menu-item">
                                                            <a class="menu-link py-3" href="widgets/feeds.html">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Feeds</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::Navbar-->
                            <!--begin::Topbar-->
                            <div class="d-flex align-items-stretch flex-shrink-0">
                                <!--begin::Toolbar wrapper-->
                                <div class="d-flex align-items-stretch flex-shrink-0">

                                    <!--begin::User-->
                                    <div class="d-flex align-items-center ms-1 ms-lg-3"
                                        id="kt_header_user_menu_toggle">
                                        <!--begin::Menu wrapper-->
                                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                                            data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                            data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                            <img src="assets/media/avatars/150-2.jpg" alt="metronic" />
                                        </div>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content d-flex align-items-center px-3">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-50px me-5">
                                                        <img alt="Logo" src="assets/media/avatars/150-2.jpg" />
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Username-->
                                                    <div class="d-flex flex-column">
                                                        <div class="fw-bolder d-flex align-items-center fs-5">Max
                                                            Smith
                                                            <span
                                                                class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span>
                                                        </div>
                                                        <a href="#"
                                                            class="fw-bold text-muted text-hover-primary fs-7">max@kt.com</a>
                                                    </div>
                                                    <!--end::Username-->
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-5">
                                                <a href="account/overview.html" class="menu-link px-5">My
                                                    Profile</a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-5">
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf

                                                    <a class="menu-link px-5" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                        {{ __('Log Out') }}
                                                    </a>
                                                </form>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                        <!--end::Menu wrapper-->
                                    </div>
                                    <!--end::User -->
                                    <!--begin::Heaeder menu toggle-->
                                    <div class="d-flex align-items-center d-lg-none ms-2 me-n3"
                                        title="Show header menu">
                                        <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                                            id="kt_header_menu_mobile_toggle">
                                            <!--begin::Svg Icon | path: icons/duotone/Text/Toggle-Right.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M22 11.5C22 12.3284 21.3284 13 20.5 13H3.5C2.6716 13 2 12.3284 2 11.5C2 10.6716 2.6716 10 3.5 10H20.5C21.3284 10 22 10.6716 22 11.5Z"
                                                            fill="black" />
                                                        <path opacity="0.5" fill-rule="evenodd"
                                                            clip-rule="evenodd"
                                                            d="M14.5 20C15.3284 20 16 19.3284 16 18.5C16 17.6716 15.3284 17 14.5 17H3.5C2.6716 17 2 17.6716 2 18.5C2 19.3284 2.6716 20 3.5 20H14.5ZM8.5 6C9.3284 6 10 5.32843 10 4.5C10 3.67157 9.3284 3 8.5 3H3.5C2.6716 3 2 3.67157 2 4.5C2 5.32843 2.6716 6 3.5 6H8.5Z"
                                                            fill="black" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Heaeder menu toggle-->
                                </div>
                                <!--end::Toolbar wrapper-->
                            </div>
                            <!--end::Topbar-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Toolbar-->
                    <div class="toolbar" id="kt_toolbar">
                        <!--begin::Container-->
                        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                            <!--begin::Page title-->
                            <div data-kt-place="true" data-kt-place-mode="prepend"
                                data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                                class="page-title d-flex align-items-center me-3">
                                <!--begin::Title-->
                                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Dashboard
                                    <!--begin::Separator-->
                                    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                                    <!--end::Separator-->
                                    <!--begin::Description-->
                                    <small class="text-muted fs-7 fw-bold my-1 ms-1">#XRS-45670</small>
                                    <!--end::Description-->
                                </h1>
                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center py-1">

                                <!--end::Wrapper-->
                                <!--begin::Button-->
                                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">Create</a>
                                <!--end::Button-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Post-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" class="container">

                            @yield('content')

                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Post-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div
                        class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-1">2021©</span>
                            <a href="" target="_blank"
                                class="text-gray-800 text-hover-primary">Keenthemes</a>
                        </div>
                        <!--end::Copyright-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('backend/js/plugins.bundle.js') }}"></script>
    <script src="{{ asset('backend/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('backend/js/widgets.js') }}"></script>
    <script src="{{ asset('backend/js/chat.js') }}"></script>
    <script src="{{ asset('backend/js/create-app.js') }}"></script>
    <script src="{{ asset('backend/js/upgrade-plan.js') }}"></script>
</body>
<!--end::Body-->

</html>
