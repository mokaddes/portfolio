@extends('admin.layouts.master')
@section('categories', 'active')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/file-uploaders/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/data-list-view.css') }}">
@endpush
@section('content')
    <input type="hidden" id="store_route" value="{{ route('admin.categories.store') }}">
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Categories</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Categories</li>
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
                    <div class="table-responsive">
                        <table class="table data-thumb-view">
                            <thead>
                            <tr>
                                <th></th>
                                <th>NAME</th>
                                <th>STATUS</th>
                                <th>ORDER</th>
                                <th>TAGS</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td></td>
                                    <td class="product-name">{{ $category->name }}</td>
                                    <td>
                                        <div class="chip chip-{{ $category->status ? 'success' : 'danger' }}">
                                            <div class="chip-body">
                                                <div class="chip-text">{{ $category->status ? 'Active' : 'Inactive' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-popularity">{{ $category->order_id ?? '-' }}</td>
                                    <td>
                                        @if($category->tags && count($category->tags))
                                            @foreach($category->tags as $tag)
                                                <span class="badge badge-primary badge-sm">{{ $tag }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="product-action">
                                        @php
                                            $editData = [
                                                'update_route' => route('admin.categories.update', $category->id),
                                                'name' => $category->name,
                                                'status' => $category->status ? 1 : 0,
                                                'order_id' => $category->order_id,
                                                'tags' => is_array($category->tags) ? implode(', ', $category->tags) : $category->tags,
                                            ];
                                        @endphp
                                        <a href="#" class="action-edit" data-edit='{{ json_encode($editData) }}'><i class="feather icon-edit"></i></a>
                                        <a href="{{ route('admin.categories.delete', $category->id) }}" class="action-delete" onclick="return confirm('Delete this category?')"><i class="feather icon-trash"></i></a>
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
                                <div><h4 class="text-uppercase">Category Data</h4></div>
                                <div class="hide-data-sidebar"><i class="feather icon-x"></i></div>
                            </div>
                            <div class="data-items pb-3">
                                <div class="data-fields px-2 mt-3">
                                    <form action="{{ route('admin.categories.store') }}" method="post" id="categoryForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-name">Name</label>
                                                <input type="text" name="name" class="form-control" id="data-name" required>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-status">Status</label>
                                                <select class="form-control" name="status" id="data-status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Deactivate</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-order_id">Order ID</label>
                                                <input type="text" name="order_id" class="form-control" id="data-order_id">
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-tags">Tags (comma separated)</label>
                                                <input type="text" name="tags" class="form-control" id="data-tags" placeholder="e.g. Laravel, PHP, API">
                                            </div>
                                        </div>
                                        <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                            <div class="add-data-btn">
                                                <button type="button" class="btn btn-primary submitBtn">Save</button>
                                            </div>
                                            <div class="cancel-data-btn">
                                                <button type="button" class="btn btn-outline-danger cancel-data-btn">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
