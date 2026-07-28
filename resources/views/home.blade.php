@extends('admin.layouts.master')
@section('dashboard', 'active')


@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="dashboard-analytics">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card bg-analytics text-white">
                                <div class="card-content">
                                    <div class="card-body text-center">
                                        <img src="{{ asset('app-assets/images/elements/decore-left.png') }}" class="img-left" alt=" card-img-left">
                                        <img src="{{ asset('app-assets/images/elements/decore-right.png') }}" class="img-right" alt=" card-img-right">
                                        <div class="avatar avatar-xl bg-primary shadow mt-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-award white font-large-1"></i>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h1 class="mb-2 text-white">Dashboard Overview</h1>
                                            <p class="m-auto w-75">Welcome back! Here's a summary of your portfolio.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-briefcase text-primary font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1 mb-25">{{ $activeProjects }}/{{ $totalProjects }}</h2>
                                    <p class="mb-0">Active / Total Projects</p>
                                </div>
                                <div class="card-content">
                                    <div id="subscribe-gain-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-warning p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-file-text text-warning font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1 mb-25">{{ $publishedBlogs }}/{{ $totalBlogs }}</h2>
                                    <p class="mb-0">Published / Total Blogs</p>
                                </div>
                                <div class="card-content">
                                    <div id="orders-received-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row pb-50">
                                            <div class="col-lg-6 col-12 d-flex justify-content-between flex-column order-lg-1 order-2 mt-lg-0 mt-2">
                                                <div>
                                                    <h2 class="text-bold-700 mb-25">{{ $totalVisitors }}</h2>
                                                    <p class="text-bold-500 mb-75">Total Visitors</p>
                                                </div>
                                                <a href="{{ route('admin.visitors') }}" class="btn btn-primary shadow">View Details <i class="feather icon-chevrons-right"></i></a>
                                            </div>
                                            <div class="col-lg-6 col-12 d-flex justify-content-between flex-column text-right order-lg-2 order-1">
                                                <div class="dropdown chart-dropdown">
                                                    <button class="btn btn-sm border-0 dropdown-toggle p-0" type="button" id="dropdownItem5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Stats
                                                    </button>
                                                </div>
                                                <div id="avg-session-chart"></div>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row avg-sessions pt-50">
                                            <div class="col-3">
                                                <p class="mb-0">Projects</p>
                                                <div class="progress progress-bar-primary mt-25">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $totalProjects }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ min($totalProjects * 10, 100) }}%"></div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <p class="mb-0">Skills</p>
                                                <div class="progress progress-bar-warning mt-25">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $totalSkills }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ min($totalSkills * 10, 100) }}%"></div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <p class="mb-0">Tools</p>
                                                <div class="progress progress-bar-danger mt-25">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $totalTools }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ min($totalTools * 10, 100) }}%"></div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <p class="mb-0">Educations</p>
                                                <div class="progress progress-bar-success mt-25">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $totalEducations }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ min($totalEducations * 20, 100) }}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <h4 class="card-title">Content Summary</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-12 col-12 d-flex flex-column flex-wrap text-center">
                                                <h1 class="font-large-2 text-bold-700 mt-2 mb-0">{{ $totalCategories }}</h1>
                                                <small>Categories</small>
                                            </div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mt-2">
                                            <div class="text-center">
                                                <p class="mb-50">Skills</p>
                                                <span class="font-large-1">{{ $totalSkills }}</span>
                                            </div>
                                            <div class="text-center">
                                                <p class="mb-50">Tools</p>
                                                <span class="font-large-1">{{ $totalTools }}</span>
                                            </div>
                                            <div class="text-center">
                                                <p class="mb-50">Qualities</p>
                                                <span class="font-large-1">{{ $totalQualities }}</span>
                                            </div>
                                            <div class="text-center">
                                                <p class="mb-50">Education</p>
                                                <span class="font-large-1">{{ $totalEducations }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row match-height">
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <h4>Quick Stats</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="chart-info d-flex justify-content-between mb-1">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                                <span class="text-bold-600 ml-50">Active Projects</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{ $activeProjects }}</span>
                                            </div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mb-1">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-warning"></i>
                                                <span class="text-bold-600 ml-50">Categories</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{ $totalCategories }}</span>
                                            </div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mb-75">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-danger"></i>
                                                <span class="text-bold-600 ml-50">Total Visitors</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{ $totalVisitors }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-start">
                                    <div>
                                        <h4 class="card-title">Content Distribution</h4>
                                        <p class="text-muted mt-25 mb-0">All entities</p>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body px-0">
                                        <div id="sales-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Latest Blogs</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="activity-timeline timeline-left list-unstyled">
                                            @forelse($latestBlogs as $blog)
                                                <li>
                                                    <div class="timeline-icon bg-{{ $blog->status ? 'primary' : 'warning' }}">
                                                        <i class="feather icon-file-text font-medium-2 align-middle"></i>
                                                    </div>
                                                    <div class="timeline-info">
                                                        <p class="font-weight-bold mb-0">{{ Str::limit($blog->title, 30) }}</p>
                                                        <span class="font-small-3">{{ $blog->category ?? 'Uncategorized' }} &middot; {{ $blog->status ? 'Published' : 'Draft' }}</span>
                                                    </div>
                                                    <small class="text-muted">{{ $blog->created_at->diffForHumans() }}</small>
                                                </li>
                                            @empty
                                                <li>
                                                    <div class="timeline-icon bg-secondary">
                                                        <i class="feather icon-info font-medium-2 align-middle"></i>
                                                    </div>
                                                    <div class="timeline-info">
                                                        <p class="font-weight-bold mb-0">No blogs yet</p>
                                                        <span class="font-small-3">Create your first blog post</span>
                                                    </div>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
