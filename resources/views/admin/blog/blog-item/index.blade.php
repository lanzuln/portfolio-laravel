@extends('admin.layout.layout')
@section('content')
    <section class="section">

        <div class="row">
            <div class="col-12">
                <div class="section-header">
                    <h1>Blog Item</h1>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>All blog Item</h4>
                        <div class="card-header-action">
                            <a href="{{ route('blog-item.create') }}" class="btn btn-success">Create new <i
                                    class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">

                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
