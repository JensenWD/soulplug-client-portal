@extends('master')

@section('body')
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Your cosigned items</h1>
            </div>
        </div>

        <div class="row">
            <div class="col mt-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newItemModal">Add a new
                    item
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col mt-5">
                <table class="table table-bordered" id="users-table">
                    <thead>
                    <tr>
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
    </div>

    <!-- Modal -->
    @include('layouts.partials.new-item-modal')
@endsection

@push('scripts')
    <script>
        $(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('client-table') !!}',
                columns: [
                    // { data: 'id', name: 'id' },
                    {data: 'name', name: 'name'},
                    {data: 'size', name: 'size'},
                    {data: 'condition', name: 'condition'},
                    {data: 'range', name: 'range'},
                    {data: 'dropped_off', name: 'dropped_off'},
                    {data: 'sold_on', name: 'sold_on'}
                ]
            });
        });
    </script>
@endpush