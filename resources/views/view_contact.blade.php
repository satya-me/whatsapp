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

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <br><br>
        <div class="card table-box">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">All Contacts</h3>
                <a href="{{ route('create') }}"><button>Add Contacts</button></a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            {{-- <th class="cell">Sl No</th> --}}
                            <th class="cell">Name</th>
                            <th class="cell">Country Code</th>
                            <th class="cell">Contact No</th>
                            <th class="cell">Status</th>
                            <th class="cell">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                {{-- <td class="cell">{{ $loop->iteration }}</td> --}}
                                <td class="cell">{{ $contact->name }}</td>
                                <td class="cell">{{ $contact->country_code }}</td>
                                <td class="cell">{{ $contact->contact_no }}</td>
                                <td class="cell">{{ $contact->status }}</td>
                                <td class="cell">
                                    <button class="editContactModal btn btn-sm btn-primary" data-id="{{ $contact->id }}"
                                        data-name="{{ $contact->name }}" data-country_code="{{ $contact->country_code }}"
                                        data-contact_no="{{ $contact->contact_no }}" data-status="{{ $contact->status }}"
                                        data-bs-toggle="modal" data-bs-target="#basicModal{{ $contact->id }}">
                                        Edit
                                    </button>
                                    <div class="modal fade" id="basicModal{{ $contact->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="awbHeader{{ $contact->id }}">Edit Contact
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Add your form fields for editing an item here -->
                                                    <form action="{{ route('update_contact')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" id="contactId"
                                                            value="{{ $contact->id }}">
                                                        <div class="mb-3">
                                                            <label for="contactName" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="contactName"
                                                                value="{{ $contact->name }}" name="name">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="contactCountryCode" class="form-label">Country
                                                                Code</label>
                                                            <input type="text" class="form-control"
                                                                id="contactCountryCode" name="country_code"
                                                                value="{{ $contact->country_code }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="contactNo" class="form-label">Contact No</label>
                                                            <input type="text" class="form-control" id="contactNo"
                                                                name="contact_no" value="{{ $contact->contact_no }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="contactStatus" class="form-label">Status</label>
                                                            <input type="text" class="form-control" id="contactStatus"
                                                                name="status" value="{{ $contact->status }}">
                                                        </div>

                                                        <button class="btn btn-primary">Save</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('admin.delete_contact', $contact->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                                    </form>
                                    {{-- <a href="#" class="btn btn-sm btn-success">Send</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>
        </div>



    </div>
@endsection
@section('scripts')

@endsection
