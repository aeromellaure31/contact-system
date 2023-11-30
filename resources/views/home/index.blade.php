@extends('layouts.app-master')

@section('content')
    <div class="container">
        @auth
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-2">
                            <h2>Contacts</h2>
                        </div>
                        <div class="col-sm-7">
                            <input class="form-control" id="contactSearch" type="text" placeholder="Search contact">
                        </div>
                        <div class="col-sm-3">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addContact"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                        </div>
                    </div>
                </div>
                
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="contactTable">
                        @if ($contact)
                            @foreach ($contact as $cont)
                                <tr>
                                    <td>{{ $cont->name }}</td>
                                    <td>{{ $cont->company }}</td>
                                    <td>{{ $cont->phone }}</td>
                                    <td>{{ $cont->email }}</td>
                                    <td>
                                        <a href="#" class="edit" data-bs-toggle="modal" data-bs-target="#editContact-{{ $cont->id }}">Edit</a>
                                        <a href="#" class="delete" data-bs-toggle="modal" data-bs-target="#deleteContact-{{ $cont->id }}">Delete</a>
                                    </td>
                                </tr>
                                <!-- Edit Contact HTML -->
                                <div id="editContact-{{ $cont->id }}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('contacts.update', $cont->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                                <div class="modal-header">						
                                                    <h4 class="modal-title">Edit Employee</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">			
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" name="name" value="{{ $cont->name }}" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Company</label>
                                                        <input type="text" name="company" value="{{ $cont->company }}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" name="phone" value="{{ $cont->phone }}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="email" value="{{ $cont->email }}" class="form-control">
                                                    </div>					
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Contact HTML -->
                                <div id="deleteContact-{{ $cont->id }}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('contacts.destroy', $cont->id) }}" method="Post">
                                            @csrf
                                            @method('DELETE')
                                                <div class="modal-header">						
                                                    <h4 class="modal-title">Delete Contact</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">					
                                                    <p>Are you sure you want to delete {{ $cont->name }} Contact?</p>
                                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                                                    <button type="submit" class="btn btn-success">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $contact->links('pager.index') }}
            </div>
        </div>

        <!-- Add Contact HTML -->
        <div id="addContact" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf
                        <div class="modal-header">						
                            <h4 class="modal-title">Add Employee</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">			
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Company</label>
                                <input type="text" name="company" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>					
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel" aria-label="Close">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection