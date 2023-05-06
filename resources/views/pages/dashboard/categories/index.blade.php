@extends('pages.dashboard.layouts.main')
@section('head-script')
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
@endsection
@section('main')
    <div class="d-flex justify-content-between flex-md-nowrap align-items-center border-bottom mb-3 flex-wrap pt-3 pb-2">
        <h3>Categories (Mata Pelajaran)</h3>
        <a class="btn btn-sm btn-primary" href="{{ route('categories.create') }}">
            <i class="ti ti-pencil-plus"></i> Add a category
        </a>
    </div>
    <table class="table-striped table-bordered w-100 table" id="categories-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Added by</th>
                <th>Last Edited by</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->code }}</td>
                    <td>{{ $category->added_by }}<br>({{ $category->created_at }})</td>
                    <td>{{ $category->last_edited_by }}<br>({{ $category->updated_at }})</td>
                    <td class="text-right">
                        <div class="d-grid d-flex gap-2">
                            <a class="btn btn-sm btn-primary" id="edit" data-bs-toggle="tooltip" data-bs-title="Edit this category" href="{{ route('categories.edit', $category->id) }}"><i class="ti ti-edit"></i></a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="delete-category-btn btn btn-sm btn-danger" id="delete" data-bs-toggle="tooltip" data-bs-title="Delete this category" type="submit"><i class="ti ti-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#categories-table').DataTable({
                pageLength: 5,
                scrollX: true,
                paging: true,
                searching: true,
                info: true,
                stateSave: true,
                lengthMenu: [5, 10, 25, 50, 100]
            });
            $('.dataTables_info, .dataTables_paginate').addClass('mt-4 mb-5');
            $('.dataTables_length').addClass('mb-4');
            
        })
    </script>
@endsection
