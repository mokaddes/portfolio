@extends('admin.layouts.master')
@section('ai-providers', 'active')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
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
                            <h2 class="content-header-title float-left mb-0">AI Providers</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active">AI Providers</li>
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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Configure AI Providers</h4>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#addProviderModal">Add Provider</button>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Provider</th>
                                                <th>Model</th>
                                                <th>API URL</th>
                                                <th>Active</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($providers as $provider)
                                                <tr>
                                                    <td>{{ $provider->name }}</td>
                                                    <td><span class="badge badge-info">{{ $provider->provider }}</span></td>
                                                    <td>{{ $provider->model ?? '-' }}</td>
                                                    <td style="max-width:200px;overflow:hidden;text-overflow:ellipsis;">{{ $provider->api_url ?? '-' }}</td>
                                                    <td>
                                                        @if($provider->is_active)
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <a href="{{ route('admin.ai-provider.toggle-active', $provider->id) }}" class="badge badge-secondary">Activate</a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#editProviderModal{{ $provider->id }}"><i class="feather icon-edit"></i></a>
                                                        <a href="{{ route('admin.ai-provider.delete', $provider->id) }}" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this provider?')"><i class="feather icon-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="6" class="text-center">No AI providers configured yet.</td></tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addProviderModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.ai-provider.store') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add AI Provider</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. My OpenAI" required>
                        </div>
                        <div class="form-group">
                            <label>Provider</label>
                            <select name="provider" class="form-control" required>
                                <option value="openai">OpenAI</option>
                                <option value="gemini">Gemini</option>
                                <option value="vllm">vLLM</option>
                                <option value="ollama">Ollama</option>
                                <option value="openai_compatible">OpenAI Compatible</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>API Key</label>
                            <input type="password" name="api_key" class="form-control" placeholder="sk-...">
                        </div>
                        <div class="form-group">
                            <label>API URL</label>
                            <input type="text" name="api_url" class="form-control" placeholder="https://api.openai.com/v1/chat/completions">
                        </div>
                        <div class="form-group">
                            <label>Model</label>
                            <input type="text" name="model" class="form-control" placeholder="gpt-3.5-turbo">
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="is_active" value="1"> Set as active
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach($providers as $provider)
    <div class="modal fade" id="editProviderModal{{ $provider->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.ai-provider.update', $provider->id) }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Edit: {{ $provider->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $provider->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Provider</label>
                            <select name="provider" class="form-control" required>
                                <option value="openai" {{ $provider->provider == 'openai' ? 'selected' : '' }}>OpenAI</option>
                                <option value="gemini" {{ $provider->provider == 'gemini' ? 'selected' : '' }}>Gemini</option>
                                <option value="vllm" {{ $provider->provider == 'vllm' ? 'selected' : '' }}>vLLM</option>
                                <option value="ollama" {{ $provider->provider == 'ollama' ? 'selected' : '' }}>Ollama</option>
                                <option value="openai_compatible" {{ $provider->provider == 'openai_compatible' ? 'selected' : '' }}>OpenAI Compatible</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>API Key <small>(leave blank to keep current)</small></label>
                            <input type="password" name="api_key" class="form-control" placeholder="Enter new key to change">
                        </div>
                        <div class="form-group">
                            <label>API URL</label>
                            <input type="text" name="api_url" class="form-control" value="{{ $provider->api_url }}">
                        </div>
                        <div class="form-group">
                            <label>Model</label>
                            <input type="text" name="model" class="form-control" value="{{ $provider->model }}">
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="is_active" value="1" {{ $provider->is_active ? 'checked' : '' }}> Set as active
                            </label>
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
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/ui/data-list-view.js') }}"></script>
@endpush
