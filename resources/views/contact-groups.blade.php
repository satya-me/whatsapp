@extends('layouts.master')

@section('title', 'Contact Group')

@section('css')
    <style>
        .card {
            margin: 20px 0;
        }
        .table-box {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            overflow: hidden;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .table-box .table {
            margin-bottom: 0;
        }
        .table-box .actions a {
            margin-right: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <br><br>
        <div class="card table-box">
            <div class="card-header">
                <h3 class="card-title">Contact & Group</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Group Name</th>
                            <th>No Of Contact</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ANPR Group</td>
                            <td>100</td>
                            <td class="actions">
                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                <a href="#" class="btn btn-sm btn-success">Send</a>
                            </td>
                        </tr>
                        <tr>
                            <td>ATCC Group</td>
                            <td>335</td>
                            <td class="actions">
                                <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                <a href="#" class="btn btn-sm btn-success">Send</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
