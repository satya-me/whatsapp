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
                <h3 class="card-title">Contact & Group</h3>
                <a href="{{ route('create_group') }}"><button>Create Group</button></a>
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
                        @foreach ($groups as $contact)
                            <tr>
                                <td class="cell">{{ $contact->name }}</td>
                                <td class="cell">{{ $contact->contacts_allowed }}</td>
                                <td class="cell">
                                    <a href="{{ route('group.contacts', $contact->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.delete_group', $contact->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                                    </form>
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#sendModal" data-group-id="{{ $contact->id }}">Add New</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="sendModal" tabindex="-1" aria-labelledby="sendModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('assign_contact_to_group') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="sendModalLabel">Send to Contact</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="contact_id" class="form-label">Contact Person</label>
                            <select class="form-control" id="contact_id" name="contact_id" required>
                                @foreach ($contacts as $contact)
                                    <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="group_id" id="group_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var sendModal = document.getElementById('sendModal');
            sendModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var groupId = button.getAttribute('data-group-id');
                var modalGroupIdInput = sendModal.querySelector('#group_id');
                modalGroupIdInput.value = groupId;
            });
        });
    </script>
@endsection
