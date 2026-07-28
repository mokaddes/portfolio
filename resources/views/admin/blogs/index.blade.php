@extends('admin.layouts.master')
@section('blogs', 'active')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/file-uploaders/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/data-list-view.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
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
                            <h2 class="content-header-title float-left mb-0">Blog</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Blog</li>
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
                    <div class="action-btns d-none">
                        <div class="btn-dropdown mr-1 mb-1">
                            <div class="btn-group dropdown actions-dropodown">
                                <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-file"></i>Print</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table data-thumb-view">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Image</th>
                                <th>TITLE</th>
                                <th>CATEGORY</th>
                                <th>STATUS</th>
                                <th>FEATURED</th>
                                <th>PUBLISHED</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td></td>
                                    <td class="product-img">
                                        <img src="{{ asset($blog->cover_image ?? 'assets/images/placeholder.png') }}" alt="Cover" style="width:60px;height:40px;object-fit:cover;">
                                    </td>
                                    <td class="product-name">{{ Str::limit($blog->title, 40) }}</td>
                                    <td class="product-category">{{ $blog->category ?? 'Uncategorized' }}</td>
                                    <td>
                                        <div class="chip chip-{{ $blog->status ? 'success' : 'danger' }}">
                                            <div class="chip-body">
                                                <div class="chip-text">{{ $blog->status ? 'Active' : 'Draft' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($blog->is_featured)
                                            <i class="feather icon-star text-warning"></i>
                                        @else
                                            <i class="feather icon-star text-muted"></i>
                                        @endif
                                    </td>
                                    <td class="product-category">{{ $blog->published_at ? $blog->published_at->format('M d, Y') : '-' }}</td>
                                    <td class="product-action">
                                        <a href="#" data-toggle="modal" data-target="#editModal{{ $blog->id }}" class="action-edit"><i class="feather icon-edit"></i></a>
                                        <a href="{{ route('admin.blog.delete', $blog->id) }}" class="action-delete" onclick="return confirm('Delete this post?')"><i class="feather icon-trash"></i></a>
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
                                <div><h4 class="text-uppercase">New Blog Post</h4></div>
                                <div class="hide-data-sidebar"><i class="feather icon-x"></i></div>
                            </div>
                            <form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
                                <div class="data-items pb-3">
                                    <div class="data-fields px-2 mt-3">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-title">Title</label>
                                                <input type="text" class="form-control" name="title" id="data-title" required>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-category">Category</label>
                                                <select class="form-control" name="category" id="data-category">
                                                    <option value="">Select category</option>
                                                    @foreach($categories as $cat)
                                                        <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-excerpt">Excerpt</label>
                                                <textarea name="excerpt" id="data-excerpt" class="form-control" rows="2"></textarea>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-content">Content</label>
                                                <textarea name="content" id="data-content" class="form-control summernote" rows="6" required></textarea>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label for="data-status">Status</label>
                                                <select class="form-control" name="status" id="data-status">
                                                    <option value="1">Publish</option>
                                                    <option value="0">Draft</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label>
                                                    <input type="checkbox" name="is_featured" value="1"> Featured
                                                </label>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <label>
                                                    <input type="checkbox" name="generate_topics" value="1" checked> Auto-generate related topics (AI)
                                                </label>
                                            </div>
                                            <div class="col-sm-12 data-field-col data-list-upload">
                                                <div class="image_upload">
                                                    <input type="file" name="cover_image" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                    <div class="add-data-btn">
                                        <button type="submit" class="btn btn-primary">Add Blog Post</button>
                                    </div>
                                    <div class="cancel-data-btn">
                                        <button class="btn btn-outline-danger">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>

                <div class="row mt-2">
                    <div class="col-12 text-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createAiModal">
                            <i class="feather icon-zap"></i> Create with AI
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createAiModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Blog Post with AI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="createAiForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">Select category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" data-tags="{{ json_encode($cat->tags ?? []) }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Suggested tags will appear based on category</small>
                        </div>
                        <div class="form-group">
                            <label>Topic / Keywords</label>
                            <input type="text" name="topic" class="form-control" required placeholder="e.g. Laravel best practices for 2026">
                        </div>
                        <div id="suggestedTags" class="form-group" style="display:none">
                            <label>Suggested tags from category</label>
                            <div id="tagList" class="d-flex flex-wrap gap-1"></div>
                        </div>
                        <div class="form-group">
                            <div class="progress" style="display:none" id="aiProgress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:100%">Generating...</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="generateBtn">
                            <i class="feather icon-zap"></i> Generate
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach($blogs as $blog)
    <div class="modal fade" id="editModal{{ $blog->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Edit: {{ Str::limit($blog->title, 40) }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ $blog->slug }}">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control">
                                <option value="">Select category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->name }}" {{ $blog->category == $cat->name ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Excerpt</label>
                            <textarea name="excerpt" class="form-control" rows="2">{{ $blog->excerpt }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" class="form-control summernote-edit" rows="6" required>{{ $blog->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ $blog->status ? 'selected' : '' }}>Publish</option>
                                <option value="0" {{ !$blog->status ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="is_featured" value="1" {{ $blog->is_featured ? 'checked' : '' }}> Featured
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="generate_topics" value="1"> Regenerate related topics (AI)
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Cover Image</label>
                            <input type="file" name="cover_image" class="form-control">
                            @if($blog->cover_image)
                                <small>Current: {{ $blog->cover_image }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
@endsection
@push('scripts')
    <script src="{{ asset('app-assets/vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
                toolbar: [['style',['bold','italic','underline']],['para',['ul','ol']],['insert',['link']],['view',['codeview']]]
            });
            $('.summernote-edit').summernote({
                height: 200,
                toolbar: [['style',['bold','italic','underline']],['para',['ul','ol']],['insert',['link']],['view',['codeview']]]
            });

            $('select[name="category_id"]').on('change', function() {
                var selected = $(this).find('option:selected');
                var tags = selected.data('tags');
                var $container = $('#suggestedTags');
                var $tagList = $('#tagList');
                $tagList.empty();
                if (tags && tags.length) {
                    $.each(tags, function(i, tag) {
                        $tagList.append('<span class="badge badge-primary mr-1 mb-1 p-1">' + tag + '</span>');
                    });
                    $container.show();
                } else {
                    $container.hide();
                }
            });

            $('#createAiForm').on('submit', function(e) {
                e.preventDefault();
                var $btn = $('#generateBtn');
                var $progress = $('#aiProgress');
                $btn.prop('disabled', true);
                $progress.show();

                $.ajax({
                    url: '{{ route('admin.blog.create-with-ai') }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(res) {
                        $progress.hide();
                        $btn.prop('disabled', false);
                        $('#createAiModal').modal('hide');
                        location.reload();
                    },
                    error: function(xhr) {
                        $progress.hide();
                        $btn.prop('disabled', false);
                        var msg = 'Generation failed.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            msg = xhr.responseJSON.message;
                        }
                        alert(msg);
                    }
                });
            });
        });
    </script>
    <script src="{{ asset('app-assets/js/scripts/ui/data-list-view.js') }}"></script>
@endpush
