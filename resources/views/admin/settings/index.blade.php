@extends('admin.layouts.master')
@section('settings', 'active')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Settings</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Settings</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(isset($errors) && $errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first() }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">General Settings</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{ route('admin.settings.update') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Portfolio Name</label>
                                                    <input type="text" name="portfolio_name" class="form-control" value="{{ $settings->portfolio_name }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Portfolio Image</label>
                                                    <input type="file" name="portfolio_image" class="form-control">
                                                    @if($settings->portfolio_image && file_exists(public_path($settings->portfolio_image)))
                                                        <div class="mt-1">
                                                            <img src="{{ asset($settings->portfolio_image) }}" alt="Portfolio image" style="max-height:60px;">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Favicon</label>
                                                    <input type="file" name="favicon" class="form-control">
                                                    @if($settings->favicon && file_exists(public_path($settings->favicon)))
                                                        <div class="mt-1">
                                                            <img src="{{ asset($settings->favicon) }}" alt="Favicon" style="max-height:40px;">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>SEO Image</label>
                                                    <input type="file" name="seo_image" class="form-control">
                                                    @if($settings->seo_image && file_exists(public_path($settings->seo_image)))
                                                        <div class="mt-1">
                                                            <img src="{{ asset($settings->seo_image) }}" alt="SEO image" style="max-height:60px;">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Meta Title</label>
                                                    <input type="text" name="meta_title" class="form-control" value="{{ $settings->meta_title }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Meta Description</label>
                                                    <textarea name="meta_description" class="form-control" rows="2">{{ $settings->meta_description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Keywords</label>
                                                    <input type="text" name="keywords" class="form-control" value="{{ $settings->keywords }}" placeholder="comma separated keywords">
                                                </div>
                                            </div>
                                        </div>

                                        <h5 class="mt-3 mb-2">Google reCAPTCHA v3</h5>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        <input type="checkbox" name="is_captcha_enable" value="1" {{ $settings->is_captcha_enable ? 'checked' : '' }}> Enable captcha on contact form
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6"></div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Site Key</label>
                                                    <input type="text" name="captcha_key" class="form-control" value="{{ $settings->captcha_key }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Secret Key</label>
                                                    <input type="text" name="captcha_secret" class="form-control" value="{{ $settings->captcha_secret }}">
                                                </div>
                                            </div>
                                        </div>

                                        <h5 class="mt-3 mb-2">Professional Certificate</h5>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Certificate Title</label>
                                                    <input type="text" name="certificate_title" class="form-control" value="{{ $settings->certificate_title }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Certificate Issuer</label>
                                                    <input type="text" name="certificate_issuer" class="form-control" value="{{ $settings->certificate_issuer }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>Certificate Image</label>
                                                    <input type="file" name="certificate_image" class="form-control">
                                                    @if($settings->certificate_image && file_exists(public_path($settings->certificate_image)))
                                                        <div class="mt-1">
                                                            <img src="{{ asset($settings->certificate_image) }}" alt="Certificate image" style="max-height:80px;">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update Settings</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
