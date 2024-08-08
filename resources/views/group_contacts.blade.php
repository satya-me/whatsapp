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
            <div class="card-header d-flex justify-content-between" >
                <h3>Contacts in {{ $group->name }}</h3>

            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Country Code</th>
                            <th>Contact No</th>
                            <th>Status</th>
                            <th>Actions</th> <!-- New Actions Column -->
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->country_code }}</td>
                            <td>{{ $contact->contact_no }}</td>
                            <td>{{ $contact->status }}</td>
                            <td>
                                <!-- Delete Button -->
                                <form action="{{ route('contact.remove_from_group', [$group->id, $contact->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this contact from the group?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    </div>
@endsection

