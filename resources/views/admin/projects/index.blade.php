@extends('admin.layouts.master')
@section('project', 'active')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/file-uploaders/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/data-list-view.css') }}">
@endpush
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Projects</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Projects</li>
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
                <section id="data-thumb-view" class="data-thumb-view-header">
                    <input type="hidden" id="store_route" value="{{ route('admin.project.store') }}">
                    <div class="table-responsive">
                        <table class="table data-thumb-view">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Image</th>
                                <th>NAME</th>
                                <th>CATEGORY</th>
                                <th>ORDER</th>
                                <th>FEATURED</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td></td>
                                    <td class="product-img"><img src="{{ asset($project->image) }}" alt="Img placeholder" width="100"></td>
                                    <td class="product-name">
                                        <a href="{{ $project->url }}" target="_blank">{{ $project->name }}</a>
                                    </td>
                                    <td class="product-category">{{ $project->category->name ?? 'Uncategorized' }}</td>
                                    <td class="product-category">{{ $project->order ?? '-' }}</td>
                                    <td>
                                        <div class="chip chip-{{ $project->is_featured ? 'warning' : 'secondary' }}">
                                            <div class="chip-body">
                                                <div class="chip-text">{{ $project->is_featured ? 'Featured' : 'Standard' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="chip chip-{{ $project->status ? 'success' : 'danger' }}">
                                            <div class="chip-body">
                                                <div class="chip-text">{{ $project->status ? 'Active' : 'Inactive' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-action">
                                        @php
                                            $editData = [
                                                'update_route' => route('admin.project.update', $project->id),
                                                'name' => $project->name,
                                                'category_id' => $project->category_id,
                                                'status' => $project->status ? 1 : 0,
                                                'is_featured' => $project->is_featured ? 1 : 0,
                                                'url' => $project->url,
                                                'order' => $project->order,
                                                'short_description' => $project->short_description,
                                                'long_description' => $project->long_description,
                                            ];
                                        @endphp
                                        <a href="#" class="action-edit" title="Edit" data-edit='{{ json_encode($editData) }}'><i class="feather icon-edit"></i></a>
                                        <a href="{{ route('admin.project.gallery', $project) }}" title="Gallery"><i class="feather icon-image"></i></a>
                                        <a href="{{ route('admin.project.delete', $project->id) }}" class="action-delete" onclick="return confirm('Delete this project?')"><i class="feather icon-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="add-new-data-sidebar">
                        <div class="overlay-bg"></div>
                        <div class="add-new-data">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div><h4 class="text-uppercase">Add Project</h4></div>
                                <div class="hide-data-sidebar"><i class="feather icon-x"></i></div>
                            </div>
                            <form action="{{ route('admin.project.store') }}" method="post" enctype="multipart/form-data">
                                <div class="data-items pb-3">
                                    <div class="data-fields px-2 mt-3">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-name">Name</label>
                                                <input type="text" class="form-control" name="name" id="data-name" required>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-category">Category</label>
                                                <select class="form-control" id="data-category" name="category_id">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-status">Status</label>
                                                <select class="form-control" name="status" id="data-status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label><input type="checkbox" name="is_featured" value="1"> Featured</label>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-url">Url</label>
                                                <input type="url" class="form-control" name="url" id="data-url">
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-order">Order</label>
                                                <input type="number" class="form-control" name="order" id="data-order">
                                            </div>
                                            <div class="col-sm-12 data-field-col data-list-upload">
                                                <div class="image_upload">
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="short-description">Short Description</label>
                                                <textarea name="short_description" id="short-description" class="form-control" rows="2"></textarea>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-long-description">Long Description</label>
                                                <textarea name="long_description" id="data-long-description" class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                    <div class="add-data-btn">
                                        <button type="submit" class="btn btn-primary">Add Data</button>
                                    </div>
                                    <div class="cancel-data-btn">
                                        <button type="button" class="btn btn-outline-danger">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('app-assets/vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/ui/data-list-view.js') }}"></script>
@endpush
