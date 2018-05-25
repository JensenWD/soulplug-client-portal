@extends('master')

@push('head')
    <meta NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
@endpush

@section('body')
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Admin Portal</h1>
            </div>
        </div>

        <div class="row">
            <div class="col mt-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newItemModal">Mark item sold
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col mt-5">
                <h3 class="text-left">Cosigned inventory</h3>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col mt-5 mb-5">
                <table class="table table-bordered table-hover" id="items-table">
                    <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Owner</th>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Condition</th>
                        <th>Range</th>
                        <th>Dropped off</th>
                        <th>Sold on</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col mt-5">
                <h3 class="text-left">Users on the system</h3>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col mt-5">
                <table class="table table-bordered table-hover" id="users-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('layouts.partials.mark-sold-modal')
@endsection

@push('scripts')
    <script>
        $(function () {
            $('#items-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin-items-table') !!}',
                columns: [
                    {data: 'id', name: 'id' },
                    {data: 'user.name', name: 'user.name' },
                    {data: 'name', name: 'name'},
                    {data: 'size', name: 'size'},
                    {data: 'condition', name: 'condition'},
                    {data: 'range', name: 'range'},
                    {data: 'dropped_off', name: 'dropped_off'},
                    {data: 'sold_on', name: 'sold_on'}
                ]
            });
        });

        $(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin-users-table') !!}',
                columns: [
                    { data: 'name', name: 'name' },
                    {data: 'email', name: 'email'},
                    {data: 'created_at', name: 'created_at'},
                    // {data: 'condition', name: 'condition'}
                ]
            });
        });
    </script>
@endpush