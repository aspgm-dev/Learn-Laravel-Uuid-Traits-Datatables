@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-inverse table-sm table-hover table-datatables">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
@endsection