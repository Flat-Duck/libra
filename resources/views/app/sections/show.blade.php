@extends('layouts.app', ['page' => 'section'])

@section('title',  trans('crud.sections.create_title') )
@section('content')

<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.sections.show_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.sections.create_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('sections.index') }}" class="mr-4"
                                ><i class="ti ti-arrow-back"></i
                            ></a>
                            @lang('crud.sections.show_title')
                        </h4>
                        <div class="mt-3">
                            <div class="mb-3">
                                <h5>@lang('crud.sections.inputs.name')</h5>
                                <span>{{ $section->name ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>
                                    @lang('crud.sections.inputs.department_id')
                                </h5>
                                <span
                                    >{{ optional($section->department)->name ??
                                    '-' }}</span
                                >
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <div class="mt-3">
                                <a
                                    href="{{ route('sections.index') }}"
                                    class="btn btn-light"
                                >
                                    <i class="icon ion-md-return-left"></i>
                                    @lang('crud.common.back')
                                </a>

                                @can('create', App\Models\Section::class)
                                <a
                                    href="{{ route('sections.create') }}"
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
            </div>
            @endsection
        </div>
    </div>
</div>
