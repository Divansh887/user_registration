<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <style>
            body {
                color: #566787;
                background: #f5f5f5;
                font-family: 'Varela Round', sans-serif;
                font-size: 13px;
            }

            .table-responsive {
                margin: 30px 0;
            }

            .table-wrapper {
                background: #fff;
                padding: 20px 25px;
                border-radius: 3px;
                min-width: 1000px;
                box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            }


            .table-title {
                padding-bottom: 30px;
                background: #3c37d5;
                color: #fff;
                padding: 16px 30px;
                min-width: 100%;
                margin: -20px -25px 10px;
                border-radius: 3px 3px 0 0;
                position: relative;
                z-index: 1;
            }

            .table-overlap {
                position: relative;
                z-index: 2;
                margin-top: -20px;
            }

            .table-wrapper {
                background: #fff;
                padding: 20px 25px;
                border-radius: 10px;
                min-width: 1000px;
                box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
                overflow: hidden;
            }


            .table-title h2 {
                margin: 5px 0 0;
                font-size: 24px;
            }

            .table-title .btn-group {
                float: right;
            }

            .table-title .btn {
                color: #fff;
                float: right;
                font-size: 13px;
                border: none;
                min-width: 50px;
                border-radius: 2px;
                border: none;
                outline: none !important;
                margin-left: 10px;
            }

            .table-title .btn i {
                float: left;
                font-size: 21px;
                margin-right: 5px;
            }

            .table-title .btn span {
                float: left;
                margin-top: 2px;
            }

            table.table tr th,
            table.table tr td {
                border-color: #e9e9e9;
                padding: 12px 15px;
                vertical-align: middle;
            }

            table.table tr th:first-child {
                width: 60px;
            }

            table.table tr th:last-child {
                width: 100px;
            }

            table.table-striped tbody tr:nth-of-type(odd) {
                background-color: #fcfcfc;
            }

            table.table-striped.table-hover tbody tr:hover {
                background: #f5f5f5;
            }

            table.table th i {
                font-size: 13px;
                margin: 0 5px;
                cursor: pointer;
            }

            table.table td:last-child i {
                opacity: 0.9;
                font-size: 22px;
                margin: 0 5px;
            }

            table.table td a {
                font-weight: bold;
                color: #566787;
                display: inline-block;
                text-decoration: none;
                outline: none !important;
            }

            table.table td a:hover {
                color: #2196F3;
            }

            table.table td a.edit {
                color: #FFC107;
            }

            table.table td a.delete {
                color: #F44336;
            }

            table.table td i {
                font-size: 19px;
            }

            table.table .avatar {
                border-radius: 50%;
                vertical-align: middle;
                margin-right: 10px;
            }

            .pagination {
                float: right;
                margin: 0 0 5px;
            }

            .pagination li a {
                border: none;
                font-size: 13px;
                min-width: 30px;
                min-height: 30px;
                color: #999;
                margin: 0 2px;
                line-height: 30px;
                border-radius: 2px !important;
                text-align: center;
                padding: 0 6px;
            }

            .pagination li a:hover {
                color: #666;
            }

            .pagination li.active a,
            .pagination li.active a.page-link {
                background: #03A9F4;
            }

            .pagination li.active a:hover {
                background: #0397d6;
            }

            .pagination li.disabled i {
                color: #ccc;
            }

            .pagination li i {
                font-size: 16px;
                padding-top: 6px
            }

            .hint-text {
                float: left;
                margin-top: 10px;
                font-size: 13px;
            }

            /* Custom checkbox */
            .custom-checkbox {
                position: relative;
            }

            .custom-checkbox input[type="checkbox"] {
                opacity: 0;
                position: absolute;
                margin: 5px 0 0 3px;
                z-index: 9;
            }

            .custom-checkbox label:before {
                width: 18px;
                height: 18px;
            }

            .custom-checkbox label:before {
                content: '';
                margin-right: 10px;
                display: inline-block;
                vertical-align: text-top;
                background: white;
                border: 1px solid #bbb;
                border-radius: 2px;
                box-sizing: border-box;
                z-index: 2;
            }

            .custom-checkbox input[type="checkbox"]:checked+label:after {
                content: '';
                position: absolute;
                left: 6px;
                top: 3px;
                width: 6px;
                height: 11px;
                border: solid #000;
                border-width: 0 3px 3px 0;
                transform: inherit;
                z-index: 3;
                transform: rotateZ(45deg);
            }

            .custom-checkbox input[type="checkbox"]:checked+label:before {
                border-color: #03A9F4;
                background: #03A9F4;
            }

            .custom-checkbox input[type="checkbox"]:checked+label:after {
                border-color: #fff;
            }

            .custom-checkbox input[type="checkbox"]:disabled+label:before {
                color: #b8b8b8;
                cursor: auto;
                box-shadow: none;
                background: #ddd;
            }

            /* Modal styles */

            .modal .modal-header,
            .modal .modal-body,
            .modal .modal-footer {
                padding: 20px 30px;
            }

            .modal .modal-content {
                border-radius: 3px;
                font-size: 14px;
            }

            .modal .modal-footer {
                background: #ecf0f1;
                border-radius: 0 0 3px 3px;
            }

            .modal .modal-title {
                display: inline-block;
            }

            .modal .form-control {
                border-radius: 2px;
                box-shadow: none;
                border-color: #dddddd;
            }

            .modal textarea.form-control {
                resize: vertical;
            }

            .modal .btn {
                border-radius: 2px;
                min-width: 100px;
            }

            .modal form label {
                font-weight: normal;
            }
        </style>

        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>

    <body>
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2> <b>Team</b></h2> <br>
                                <span> <b> Dashbord</b> / <span style="color: grey"> All Team</span></span>
                                <br>

                            </div>
                            <div class="col-sm-6 mt-3">
                                <a href="#deleteEmployeeModal" class="btn btn-primary" data-toggle="modal"> <b>
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                                                <path
                                                    d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z" />
                                            </svg> Filter</span></b></a>
                                <a href="#addEmployeeModal" class="btn btn-success shadow-none" data-toggle="modal">
                                    <b> <i class="material-icons">add</i> <span>Add</span></b>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="p-4 bg-white rounded shadow overflow-hidden table-overlap">
                        <table class="table table-striped table-hover mb-0 table-wrapper">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Designation</th>
                                    <th>Photo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_users as $data)
                                    <tr id="user-row-{{ $data->id }}">
                                        <td>{{ $data->Name }}</td>
                                        <td>{{ $data->Mobile }}</td>
                                        <td>{{ $data->Email }}</td>
                                        <td>{{ $data->Role }}</td>
                                        <td>{{ $data->Designation }}</td>
                                        <td>
                                            <img src="{{ asset($data->Photo_Path) }}" alt="photo" width="50"
                                                height="50" class="rounded-circle">
                                        </td>

                                        @php
                                            $statusColor = $data->Status == 0 ? '#f8d7da' : '#6dde88';
                                        @endphp
                                        <td class="text-center align-middle">
                                            <button class="btn btn-sm"
                                                style="border-radius: 5px; background-color: {{ $statusColor }};">
                                                {{ $data->Status == 0 ? 'Inactive' : 'Active' }}
                                            </button>
                                            <div class="mt-1 text-muted" style="font-size: 12px;">
                                                {{ date('d/m/Y H:i:s', strtotime($data->datetime)) }}
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex gap-3">
                                                <a href="#editEmployeeModal" class="btn btn-sm text-white"
                                                    onclick="edit_user({{ $data->id }})" data-toggle="modal"
                                                    style="background-color: #8aeea1; border-radius: 5px;"
                                                    title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-pencil-fill"
                                                        viewBox="0 0 16 16">
                                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793
                                        14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646
                                        6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5
                                        0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1
                                        .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6
                                        13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5
                                        0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5
                                        0 0 1-.175-.032l-.179.178a.5.5 0 0
                                        0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5
                                        0 0 0 .168-.11z" />
                                                    </svg>
                                                </a>

                                                <a href="#deleteEmployeeModal" class="btn btn-sm text-white ms-2"
                                                    onclick="confirmAndDeleteUser({{ $data->id }})"
                                                    data-toggle="modal"
                                                    style="background-color: #e6838d; border-radius: 5px;"
                                                    title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-trash-fill"
                                                        viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1V2h13v-.5a1
                                        1 0 0 0-1-1h-11zM5.5 5a.5.5 0 0 1 1
                                        0v6a.5.5 0 0 1-1 0V5zm4 0a.5.5 0 0
                                        1 1 0v6a.5.5 0 0 1-1 0V5z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3">
                        <div class="text-muted mb-2 mb-md-0">
                            Showing <b>{{ $all_users->firstItem() }}</b> to <b>{{ $all_users->lastItem() }}</b> of
                            <b>{{ $all_users->total() }}</b> entries
                        </div>
                        <div>
                            {{ $all_users->links('pagination::bootstrap-4') }}
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <div class="modal fade" id="addEmployeeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('user_registration.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header" style="background-color: #3c37d5">
                            <h5 class="modal-title text-white">
                                <i class="bi bi-person-lines-fill me-2"></i> Create New Account
                            </h5>
                            <button type="button" class="btn shadow-none text-white" data-dismiss="modal"
                                aria-label="Close" style="background:none; border:none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                </svg>
                            </button>


                        </div>

                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control shadow-none" name="Name"
                                            placeholder="ENTER FULL NAME" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Mobile No. <span
                                                class="text-danger">*</span></label>
                                        <input type="tel" maxlength="10" class="form-control shadow-none"
                                            name="Mobile" placeholder="Enter Mobile No." required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email Id <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control shadow-none" name="Email"
                                            placeholder="Enter Email Id" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control shadow-none" name="Address"
                                            placeholder="Enter Address" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Role <span class="text-danger">*</span></label>
                                        <select name="Role" id="Role" class="form-control shadow-none"
                                            required>
                                            <option value="">Select Role</option>
                                            <option value="Developer">Developer</option>
                                            <option value="Tester">Tester</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Designation <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control shadow-none" name="Designation"
                                            placeholder="Enter Designation" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Gender <span class="text-danger">*</span></label>
                                        <select name="Gender" class="form-control shadow-none" id="Gender"
                                            required>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Upload Logo</label>
                                        <input type="file" class="form-control shadow-none" name="logo">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status </label>
                                        <select name="Status" id="status" class="form-control shadow-none">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label d-block">Marital Status <span
                                                class="text-danger">*</span></label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Marital_Status"
                                                id="single" value="S" required>
                                            <label class="form-check-label" for="single">Single</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="Marital_Status"
                                                id="married" value="M" required>
                                            <label class="form-check-label" for="married">Married</label>
                                        </div>

                                    </div>


                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Date of Birth <span
                                                class="text-danger">*</span></label>
                                        <input type="date" class="form-control shadow-none" name="DOB"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <button class="btn btn-dark shadow-none ms-3">Add Team</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editEmployeeModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

        </div>



    </body>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function edit_user(id) {
            $.ajax({
                url: 'user_registration/${id}/edit',
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    var user = data.user;
                    const csrfToken = '{{ csrf_token() }}';
                    const routeBase = "{{ url('user_registration') }}";
                    let modalHtml = `
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="editUserForm" action="${routeBase}/${user.id}" method="POST" enctype="multipart/form-data">
       <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="${csrfToken}">  <div class="modal-header" style="background-color: #3c37d5">
          <h5 class="modal-title text-white" id="editEmployeeModalLabel">
            <i class="bi bi-person-lines-fill me-2"></i> Update Team Details
          </h5>
        <button type="button" class="btn shadow-none text-white" data-dismiss="modal" aria-label="Close" style="background: none; border: none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
            </svg>
          </button>

        </div>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">

              <div class="col-md-6 mb-3">
                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control shadow-none" name="Name" placeholder="ENTER FULL NAME" required value="${user.Name || ''}">
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label">Mobile No. <span class="text-danger">*</span></label>
                <input type="tel" maxlength="10" minlength="10" class="form-control shadow-none" name="Mobile" placeholder="Enter Mobile No." required value="${user.Mobile || ''}">
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label">Email Id <span class="text-danger">*</span></label>
                <input type="email" class="form-control shadow-none" name="Email" placeholder="Enter Email Id" required value="${user.Email || ''}">
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label">Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control shadow-none" name="Address" placeholder="Enter Address" required value="${user.Address || ''}">
              </div>

              <div class="col-md-4 mb-3">
                <label class="form-label">Role <span class="text-danger">*</span></label>
                <select name="Role" class="form-control shadow-none" required>
                  <option value="">Select Role</option>
                  <option value="Developer" ${user.Role === 'Developer' ? 'selected' : ''}>Developer</option>
                  <option value="Tester" ${user.Role === 'Tester' ? 'selected' : ''}>Tester</option>
                </select>
              </div>

              <div class="col-md-4 mb-3">
                <label class="form-label">Designation <span class="text-danger">*</span></label>
                <input type="text" class="form-control shadow-none" name="Designation" placeholder="Enter Designation" required value="${user.Designation || ''}">
              </div>

              <div class="col-md-4 mb-3">
                <label class="form-label">Gender <span class="text-danger">*</span></label>
                <select name="Gender" class="form-control shadow-none" required>
                  <option value="M" ${user.Gender === 'M' ? 'selected' : ''}>Male</option>
                  <option value="F" ${user.Gender === 'F' ? 'selected' : ''}>Female</option>
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label">Upload Logo</label>
                <input type="file" class="form-control shadow-none" name="logo">
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label">Status </label>
                <select name="Status" class="form-control shadow-none" >
                  <option value="1" ${user.Status == 1 ? 'selected' : ''}>Active</option>
                  <option value="0" ${user.Status == 0 ? 'selected' : ''}>Inactive</option>
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label d-block">Marital Status <span class="text-danger">*</span></label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="Marital_Status" id="single" value="S" ${user.Marital_Status === 'S' ? 'checked' : ''} required>
                  <label class="form-check-label" for="single">Single</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="Marital_Status" id="married" value="M" ${user.Marital_Status === 'M' ? 'checked' : ''} required>
                  <label class="form-check-label" for="married">Married</label>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                <input type="date" class="form-control shadow-none" name="DOB" required value="${user.DOB || ''}">
              </div>

            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-dark shadow-none ms-3 me-auto">Update </button>
        </div>

      </form>
    </div>
  </div>
</div>`;

                    $('#editEmployeeModal').remove();

                    $('body').append(modalHtml);

                    var editModal = new bootstrap.Modal(document.getElementById('editEmployeeModal'), {
                        backdrop: 'static',
                        keyboard: false
                    });
                    editModal.show();
                },
                error: function(xhr, status, error) {
                    console.log('AJAX error:', error);
                    alert('Failed to load user data.');
                }
            });
        }

        function confirmAndDeleteUser(id) {
            Swal.fire({
                title: 'Are you sure you want to delete this record?',
                showCancelButton: true,
                confirmButtonColor: '#e6838d',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Delete',
                reverseButtons: true,
                width: '600px',
                background: '#fff5f6',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `user_registration/${id}`,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'User deleted successfully',
                                showConfirmButton: false,
                                timer: 2000,
                                background: '#e6838d',
                                color: '#fff'
                            });

                            $(`#user-row-${id}`).remove();
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Failed to delete the user. Please try again.'
                            });
                            console.error('Delete error:', error);
                        }
                    });
                }
            });
        }
    </script>

</html>
