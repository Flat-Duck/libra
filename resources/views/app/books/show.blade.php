@extends('layouts.app', ['page' => 'book'])

@section('title',  trans('crud.books.create_title') )
@section('content')

<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.books.show_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.books.create_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('books.index') }}" class="mr-4"
                                ><i class="ti ti-arrow-back"></i
                            ></a>
                            @lang('crud.books.show_title')
                        </h4>
                        <div class="mt-3">
                            <div class="mb-3">
                                <h5>@lang('crud.books.inputs.title')</h5>
                                <span>{{ $book->title ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.books.inputs.author')</h5>
                                <span>{{ $book->author ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.books.inputs.published_at')</h5>
                                <span>{{ $book->published_at ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>
                                    @lang('crud.books.inputs.publication_place')
                                </h5>
                                <span
                                    >{{ $book->publication_place ?? '-' }}</span
                                >
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.books.inputs.section_id')</h5>
                                <span
                                    >{{ optional($book->section)->name ?? '-'
                                    }}</span
                                >
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <div class="mt-3">
                                <a
                                    href="{{ route('books.index') }}"
                                    class="btn btn-light"
                                >
                                    <i class="icon ion-md-return-left"></i>
                                    @lang('crud.common.back')
                                </a>

                                @can('create', App\Models\Book::class)
                                <a
                                    href="{{ route('books.create') }}"
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
