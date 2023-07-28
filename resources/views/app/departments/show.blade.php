@extends('layouts.app', ['page' => 'department'])

@section('title',  trans('crud.departments.create_title') )
@section('content')

<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.departments.show_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.departments.create_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a
                                href="{{ route('departments.index') }}"
                                class="mr-4"
                                ><i class="ti ti-arrow-back"></i
                            ></a>
                            @lang('crud.departments.show_title')
                        </h4>
                        <div class="mt-3">
                            <div class="mb-3">
                                <h5>@lang('crud.departments.inputs.name')</h5>
                                <span>{{ $department->name ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <div class="mt-3">
                                <a
                                    href="{{ route('departments.index') }}"
                                    class="btn btn-light"
                                >
                                    <i class="icon ion-md-return-left"></i>
                                    @lang('crud.common.back')
                                </a>

                                @can('create', App\Models\Department::class)
                                <a
                                    href="{{ route('departments.create') }}"
                                    class="btn btn-light"
                                >
                                    <i class="icon ion-md-add"></i>
                                    @lang('crud.common.create')
                                </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>

                @can('view-any', App\Models\Section::class)
                <div class="card mt-3">
                    <div class="card-body">
                        <h4 class="card-title w-100 mb-2">Sections</h4>

                        <livewire:department-sections-detail
                            :department="$department"
                        />
                    </div>
                </div>
                @endcan @can('view-any', App\Models\Paper::class)
                <div class="card mt-3">
                    <div class="card-body">
                        <h4 class="card-title w-100 mb-2">Papers</h4>

                        <livewire:department-papers-detail
                            :department="$department"
                        />
                    </div>
                </div>
                @endcan
            </div>
            @endsection
        </div>
    </div>
</div>
