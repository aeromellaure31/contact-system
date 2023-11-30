<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Contacts</title>
    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      .table-responsive {
          margin: 30px 0;
      }
      .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        border-radius: 3px;
        min-width: 1000px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
      }
      .table-title {        
        padding-bottom: 15px;
        background: #435d7d;
        color: #fff;
        padding: 16px 30px;
        min-width: 100%;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
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
      table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        vertical-align: middle;
      }
      table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
      }
      table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
      }
      table.table th i {
        font-size: 12px;
        cursor: pointer;
      }	
      table.table td:last-child i {
        opacity: 0.9;
        font-size: 22px;
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
      .pagination li.active a, .pagination li.active a.page-link {
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
      /* Modal styles */
      .modal .modal-dialog {
        max-width: 400px;
      }
      .modal .modal-header, .modal .modal-body, .modal .modal-footer {
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

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<script>
  $(document).ready(function(){
    $("#contactSearch").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#contactTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
<body>
    
    @include('layouts.partials.navbar')

    <main class="container">
        @yield('content')
    </main>

    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
      
  </body>
</html>