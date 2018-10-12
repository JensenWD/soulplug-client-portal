@extends('master')

@section('body')
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Your cosigned items</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-12 mt-4">
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#newItemModal">Add a new
                            item
                        </button>
                        <button type="button" class="btn btn-outline-dark ml-2" data-toggle="modal" data-target="#updatePriceModal">
                            Update price
                        </button>
                    </div>
                </div>
                <div class="row">
                    @if (session('error'))
                        <div class="col-12 col-md-4 mt-4">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session('error') }}</strong>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="col-12 col-md-4 mt-4">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-12 mt-5">
                        <table class="table table-bordered table-striped w-100" id="users-table">
                            <thead>
                            <tr class="">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Size</th>
                                <th>Condition</th>
                                <th>($)Range</th>
                                <th>Dropped off</th>
                                <th>Sold on</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 pt-5 mt-5">
                <p class="text-muted small">If you are shipping your shoes to us make sure to send them to: <br>
                    <strong>Soul Plug <br>
                        5030 NE 2nd Ave Suite 406, Miami, FL 33137</strong>
                </p>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('layouts.partials.new-item-modal')
    @include('layouts.partials.update-price-modal')
@endsection

@push('scripts')
    <script>
        $(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('client-table') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'size', name: 'size'},
                    {data: 'condition', name: 'condition'},
                    {data: 'range', name: 'range'},
                    {data: 'dropped_off', name: 'dropped_off'},
                    {data: 'sold_on', name: 'sold_on'},
                    {data: 'approved', name: 'approved'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endpush