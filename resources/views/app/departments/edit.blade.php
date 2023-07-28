@extends('layouts.app', ['page' => 'department'])

@section('title',  trans('crud.departments.edit_title') )
@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.departments.edit_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <form
                    role="form"
                    method="PUT"
                    action="{{ route('departments.update', $department) }}"
                    enctype="multipart/form-data"
                    class="card"
                >
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.departments.edit_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                @include('app.departments.form-inputs')
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">
                            @lang('crud.common.update')
                        </button>

                        <a
                            href="{{ route('departments.index') }}"
                            class="btn btn-default"
                        >
                            @lang('crud.common.back')
                        </a>
                        <a
                            href="{{ route('departments.create') }}"
                            class="btn btn-default"
                        >
                            @lang('crud.common.create')
                        </a>
                    </div>
                </form>
                @can('view-any', App\Models\Section::class)
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="card-title w-100 mb-2">Sections</h4>
                    </div>
                    <div class="card-body">
                        <livewire:department-sections-detail
                            :department="$department"
                        />
                    </div>
                </div>
                @endcan @can('view-any', App\Models\Paper::class)
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="card-title w-100 mb-2">Papers</h4>
                    </div>
                    <div class="card-body">
                        <livewire:department-papers-detail
                            :department="$department"
                        />
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
