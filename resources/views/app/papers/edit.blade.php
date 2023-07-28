@extends('layouts.app', ['page' => 'paper'])

@section('title',  trans('crud.papers.edit_title') )
@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.papers.edit_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <form
                    role="form"
                    method="PUT"
                    action="{{ route('papers.update', $paper) }}"
                    enctype="multipart/form-data"
                    class="card"
                >
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.papers.edit_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                @include('app.papers.form-inputs')
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">
                            @lang('crud.common.update')
                        </button>

                        <a
                            href="{{ route('papers.index') }}"
                            class="btn btn-default"
                        >
                            @lang('crud.common.back')
                        </a>
                        <a
                            href="{{ route('papers.create') }}"
                            class="btn btn-default"
                        >
                            @lang('crud.common.create')
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
