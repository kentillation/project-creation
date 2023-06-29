@extends('includes/admin-sidenav')

@section('page-content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List of Student Nurse</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item">Nursing Students</li>
        <li class="breadcrumb-item active">List of nursing students</li>
      </ol>
    </nav>
  </div>
  @if(Session::has('success'))
  <!-- <div class="alert alert-danger text-center" role="alert" id="alertbox"> -->
  <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle"></i>&nbsp;
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" title="Close"></button>
  </div>
  @endif
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"></h5>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createUserModal">
              <i class="bi bi-plus"></i>
              Add User
            </button>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tbl_student as $student)
                  <tr>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                      <a href="{{ route('update-student', ['id' => $student->id] ) }}">
                        <button class="btn btn-outline-success btn-sm" title="Modify">
                          <i class="bi bi-pencil-square"></i>
                          &nbsp; Modify
                        </button>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">New Student User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <form action="{{ route('save-student') }}" method="post" class="row g-3 needs-validation" novalidate>
            @csrf

            <div class="col-12" style="display: none;">
              <label for="admin_email" class="form-label mt-2">System Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-lock"></i>
                </span>
                <input type="email" name="admin_email" id="admin_email" class="form-control" value="christianschool.main@gmail.com" required>
                <div class="invalid-feedback">Enter your admin email.</div>
              </div>
            </div>

            <div class="col-12">
              <label for="student_id" class="form-label mt-2">Student ID</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-file-person"></i>
                </span>
                <input type="text" name="student_id" id="student_id" class="form-control" required>
                <div class="invalid-feedback">Empty student id.</div>
              </div>
            </div>

            <!-- <div class="col-6">
              <label for="first_name" class="form-label mt-2">First Name</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-file-person"></i>
                </span>
                <input type="text" name="first_name" id="first_name" class="form-control" required>
                <div class="invalid-feedback">Empty first name.</div>
              </div>
            </div>

            <div class="col-6">
              <label for="middle_name" class="form-label mt-2">Middle Name</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-file-person"></i>
                </span>
                <input type="text" name="middle_name" id="middle_name" class="form-control" required>
                <div class="invalid-feedback">Empty middle name.</div>
              </div>
            </div>

            <div class="col-6">
              <label for="last_name" class="form-label mt-2">Last Name</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-file-person"></i>
                </span>
                <input type="text" name="last_name" id="last_name" class="form-control" required>
                <div class="invalid-feedback">Empty last name.</div>
              </div>
            </div>

            <div class="col-6">
              <label for="phone" class="form-label mt-2">Phone number</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-telephone"></i>
                </span>
                <input type="text" name="phone" id="phone" class="form-control" required>
                <div class="invalid-feedback">Empty phone number.</div>
              </div>
            </div> -->

            <div class="col-12">
              <label for="yourEmail" class="form-label mt-2">Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-at"></i>
                </span>
                <input type="email" name="email" class="form-control" required>
                <div class="invalid-feedback">Empty email.</div>
              </div>
            </div>

            <div class="col-12">
              <label for="yourPassword" class="form-label mt-2">Password</label>
              <div class="input-group has-validation">
                <span class="input-group-text">
                  <i class="bi bi-lock"></i>
                </span>
                <input type="password" name="password" class="form-control" required>
                <div class="invalid-feedback">Empty password.</div>
              </div>
            </div>

            <div class="col-12">
              <button class="btn btn-outline-success w-100 mt-2" type="submit">Create account</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- for Data Tables -->

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function() {
      $('table').DataTable();
    });
  </script>

</main><!-- End #main -->

@endsection