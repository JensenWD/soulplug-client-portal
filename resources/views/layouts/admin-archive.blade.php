@extends('master')

@push('head')
    <meta NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
@endpush

@section('body')
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Soul Plug Archives</h1>
            </div>
        </div>

        <div class="row">
            <div class="col mt-4">
                <a href="{{ route('admin-portal') }}">
                    <button type="button" class="btn btn-outline-primary">Back to portal</button>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col mt-5">
                <h3 class="text-left">Cosigned archives</h3>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col mt-5 mb-5">
                <table class="table table-bordered table-hover" id="items-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Owner</th>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Condition</th>
                        <th>($)Range</th>
                        <th>Dropped off</th>
                        <th>Sold</th>
                        <th>Paid off</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

    <!-- Modal -->
    @include('layouts.partials.mark-sold-modal')
    @include('layouts.partials.admin-add-item-modal')
@endsection

@push('scripts')
    <script>
        $(function () {
            $('#items-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('archived-items-table') !!}',
                columns: [
                    {data: 'id', name: 'id' },
                    {data: 'user.name', name: 'user.name' },
                    {data: 'name', name: 'name'},
                    {data: 'size', name: 'size'},
                    {data: 'condition', name: 'condition'},
                    {data: 'range', name: 'range'},
                    {data: 'dropped_off', name: 'dropped_off'},
                    {data: 'sold_on', name: 'sold_on'},
                    {data: 'paid_off', name: 'paid_off'},
                    {data: 'approved', name: 'approved'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endpush