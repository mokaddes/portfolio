@extends('admin.layouts.master')
@section('educations', 'active')
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
                            <h2 class="content-header-title float-left mb-0">Educations</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Educations</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="data-thumb-view" class="data-thumb-view-header">
                    <div class="action-btns d-none">
                        <div class="btn-dropdown mr-1 mb-1">
                            <div class="btn-group dropdown actions-dropodown">
                                <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-file"></i>Print</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-save"></i>Another Action</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table data-thumb-view">
                            <thead>
                            <tr>
                                <th></th>
                                <th>DEGREE</th>
                                <th>INSTITUTION</th>
                                <th>YEAR</th>
                                <th>CGPA</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($educations as $education)
                                <tr>
                                    <td></td>
                                    <td class="product-name">{{ $education->degree }}</td>
                                    <td class="product-category">{{ $education->institution }}</td>
                                    <td class="product-category">{{ $education->year }}</td>
                                    <td class="product-category">{{ $education->cgpa }}{{ $education->out_of_cgpa ? ' / ' . $education->out_of_cgpa : '' }}</td>
                                    <td>
                                        <div class="chip chip-{{ $education->status ? 'success' : 'danger' }}">
                                            <div class="chip-body">
                                                <div class="chip-text">{{ $education->status ? 'Active' : 'Inactive' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-action">
                                        <span class="action-edit"><a href="#"><i class="feather icon-edit"></i></a></span>
                                        <span class="action-delete"><a href="{{ route('admin.education.delete', $education->id) }}"><i class="feather icon-trash"></i></a></span>
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
                                <div><h4 class="text-uppercase">Education Data</h4></div>
                                <div class="hide-data-sidebar"><i class="feather icon-x"></i></div>
                            </div>
                            <form action="{{ route('admin.education.store') }}" method="post" enctype="multipart/form-data">
                                <div class="data-items pb-3">
                                    <div class="data-fields px-2 mt-3">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-degree">Degree</label>
                                                <input type="text" class="form-control" name="degree" id="data-degree">
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-institution">Institution</label>
                                                <input type="text" class="form-control" name="institution" id="data-institution">
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-year">Year</label>
                                                <input type="text" class="form-control" name="year" id="data-year">
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-cgpa">CGPA</label>
                                                <input type="number" step="0.01" class="form-control" name="cgpa" id="data-cgpa">
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-out_of_cgpa">Out of CGPA</label>
                                                <input type="number" step="0.01" class="form-control" name="out_of_cgpa" id="data-out_of_cgpa">
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-status">Status</label>
                                                <select class="form-control" name="status" id="data-status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Deactivate</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                    <div class="add-data-btn">
                                        <button type="submit" class="btn btn-primary">Add Data</button>
                                    </div>
                                    <div class="cancel-data-btn">
                                        <button class="btn btn-outline-danger">Cancel</button>
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
