<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Club</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap + DataTables CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" rel="stylesheet">

  <style>
    body {
    background: #f4f6f8;
    font-family: 'Segoe UI', sans-serif;
  }

  .navbar {
    background-color: #ffffff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    z-index: 1000;
  }

  .sidebar {
    width: 220px;
    background-color: #2c3e50;
    color: #fff;
    height: 100vh;
    position: fixed;
    top: 56px;
    left: 0;
    padding-top: 20px;
  }

  .sidebar .nav-link {
    color: #dee2e6;
    padding: 12px 20px;
  }

  .sidebar .nav-link:hover,
  .sidebar .nav-link.active {
    background-color: #34495e;
    color: #fff;
  }

  .sidebar .menu-icon {
    margin-right: 10px;
  }

  .page-content {
    margin-left: 220px;
    padding: 80px 30px 30px 30px;
  }

  h2 {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 30px;
    text-align: center;
  }

  .form-label {
    font-weight: 600;
    color: #2c3e50;
  }

  .form-select {
    background-color: #fef9e7;
    border-color: #dadfe1;
    color: #2c3e50;
    font-weight: 500;
    border-radius: 6px;
  }

  .form-select:focus {
    border-color: #2c3e50;
    box-shadow: 0 0 6px rgba(44, 62, 80, 0.3);
  }

  table.dataTable {
    border: 1px solid #dadfe1;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    background-color: #ffffff;
  }

  table.dataTable thead {
    background-color: #2c3e50;
    color: #ffffff;
    font-weight: bold;
    font-size: 1rem;
  }
    .form-control,
  .form-select,
  textarea.form-control {
    height: 45px;
    font-size: 15px;
    margin-top: 5px;
  }

  textarea.form-control {
    height: auto; /* So the intro box can be multiline */
    resize: vertical;
  }

  label.form-label {
    font-size: 15px;
    font-weight: 500;
  }

  .btn-primary {
    padding: 10px;
    font-size: 16px;
  }
  table.dataTable tbody tr:nth-of-type(even) {
    background-color: #f8f9fa;
  }

  table.dataTable tbody tr:nth-of-type(odd) {
    background-color: #ffffff;
  }

  table.dataTable tbody tr:hover {
    background-color: #ecf0f1;
  }

  .dataTables_wrapper .dataTables_filter input,
  .dataTables_wrapper .dataTables_length select {
    border: 1px solid #dadfe1;
    border-radius: 6px;
    padding: 6px;
    background-color: #ffffff;
    color: #2c3e50;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button {
    border-radius: 4px;
    margin: 2px;
    padding: 5px 10px;
    background-color: #ecf0f1;
    border: none;
    color: #2c3e50;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background-color: #2c3e50 !important;
    color: #ffffff !important;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background-color: #34495e;
    color: #ffffff;
  }

  .btn-primary:hover {
    background-color: #0056b3 !important;
    border-color: #0056b3 !important;
  }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top p-3">
  <div class="container-fluid d-flex justify-content-between">
    <h5 class="mb-0 text-dark">Add New Club</h5>
    <a href="{{ url('/logout') }}" class="btn btn-outline-danger">
      <i class="mdi mdi-logout me-1"></i> Sign Out
    </a>
  </div>
</nav>

<!-- SIDEBAR -->
<nav class="sidebar" id="sidebar">
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/') }}">
        <i class="mdi mdi-home menu-icon"></i><span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ url('/form') }}">
        <i class="mdi mdi-plus-box menu-icon"></i><span class="menu-title">Add New Club</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/table') }}">
        <i class="mdi mdi-table-large menu-icon"></i><span class="menu-title">Tables</span>
      </a>
    </li>
  </ul>
</nav>

<!-- FORM -->
<div class="d-flex justify-content-center" style="margin-left: 220px; padding: 80px 20px 20px; background: #f4f6f8; height: auto;">
  <div class="card p-3" style="width: 100%; max-width: 500px; box-shadow: 0 0 10px rgba(0,0,0,0.05); border-radius: 10px;">
    <div class="card-body p-3">
      <h5 class="text-center mb-3" style="color: #2c3e50; font-weight: 600;">Add New Club</h5>

      <form method="POST" action="{{ route('clubs.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-2">
          <label for="clubName" class="form-label">Club Name</label>
          <input type="text" class="form-control" name="club_name" placeholder="Enter club name" required>
        </div>

        <div class="mb-2">
          <label for="clubLogo" class="form-label">Club Logo</label>
          <input type="file" class="form-control" name="logo_path" accept="image/*" required>
        </div>

        <div class="mb-2">
          <label class="form-label">Club Introduction</label>
          <textarea class="form-control" name="introduction" rows="2" placeholder="Brief introduction" required></textarea>
        </div>

        <div class="mb-2">
          <label class="form-label">Staff Co-ordinator</label>
          <input type="text" class="form-control" name="staff_coordinator" placeholder="Coordinator name" required>
        </div>

        <div class="mb-2">
          <label class="form-label">Staff Email ID</label>
          <input type="email" class="form-control" name="staff_email" placeholder="Staff email" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Year of Start</label>
          <input type="text" class="form-control" name="year_start" placeholder="e.g., 2024" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Submit</button>
      </form>
    </div>
  </div>
</div>

</body>
</html>
