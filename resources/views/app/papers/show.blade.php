@extends('layouts.app', ['page' => 'paper'])

@section('title',  trans('crud.papers.create_title') )
@section('content')

<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.papers.show_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.papers.create_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('papers.index') }}" class="mr-4"
                                ><i class="ti ti-arrow-back"></i
                            ></a>
                            @lang('crud.papers.show_title')
                        </h4>
                        <div class="mt-3">
                            <div class="mb-3">
                                <h5>@lang('crud.papers.inputs.title')</h5>
                                <span>{{ $paper->title ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.papers.inputs.publisher')</h5>
                                <span>{{ $paper->publisher ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>
                                    @lang('crud.papers.inputs.published_at')
                                </h5>
                                <span>{{ $paper->published_at ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>
                                    @lang('crud.papers.inputs.department_id')
                                </h5>
                                <span
                                    >{{ optional($paper->department)->name ??
                                    '-' }}</span
                                >
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <div class="mt-3">
                                <a
                                    href="{{ route('papers.index') }}"
                                    class="btn btn-light"
                                >
                                    <i class="icon ion-md-return-left"></i>
                                    @lang('crud.common.back')
                                </a>

                                @can('create', App\Models\Paper::class)
                                <a
                                    href="{{ route('papers.create') }}"
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
