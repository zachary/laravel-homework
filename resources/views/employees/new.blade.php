<!DOCTYPE html>

<html lang="en">
<head>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Laravel DataTable Ajax Crud Tutorial - Tuts Make</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.1.2/handlebars.min.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
<div class="container">
<a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-product">Add New</a>
<br><br>
    <table class="table table-bordered" id="employees-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
<th>Last Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<div class="modal fade" id="ajax-product-modal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="productCrudModal"></h4>
    </div>
    <div class="modal-body">
        <form id="productForm" name="productForm" class="form-horizontal">
           <input type="hidden" name="product_id" id="product_id">
            <div class="form-group">
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">Employee ID</label>
                    <input type="text" class="form-control col-sm-8" id="emp_id" name="emp_id" placeholder="Enter" value="" maxlength="50" required="">
                </div>
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">Name Prefix</label>
                    <input type="text" class="form-control col-sm-8" id="name_prefix" name="name_prefix" placeholder="Enter" value="" maxlength="5" required="">
                </div>
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">First Name</label>
                    <input type="text" class="form-control col-sm-8" id="first_name" name="first_name" placeholder="Enter" value="" maxlength="50" required="">
                </div>
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">Last Name</label>
                    <input type="text" class="form-control col-sm-8" id="last_name" name="last_name" placeholder="Enter" value="" maxlength="50" required="">
                </div>
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">Middle Initial</label>
                    <input type="text" class="form-control col-sm-8" id="middle_initial" name="middle_initial" placeholder="Enter" value="" maxlength="7" required="">
                </div>
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">Gender</label>
                    <input type="text" class="form-control col-sm-8" id="gender" name="gender" placeholder="M" value="" maxlength="1" required="">
                </div>
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">Father's Name</label>
                    <input type="text" class="form-control col-sm-8" id="fathers_name" name="fathers_name" placeholder="Enter" value="" maxlength="50" required="">
                </div>
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">Mother's Name</label>
                    <input type="text" class="form-control col-sm-8" id="mothers_name" name="mothers_name" placeholder="Enter" value="" maxlength="50" required="">
                </div>
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">Mother's Maiden Name</label>
                    <input type="text" class="form-control col-sm-8" id="mothers_maiden_name" name="mothers_maiden_name" placeholder="Enter" value="" maxlength="50" required="">
                </div>
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">Email</label>
                    <input type="text" class="form-control col-sm-8" id="email" name="email" placeholder="Enter" value="" maxlength="50" required="">
                </div>
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">DOB</label>
                    <input type="text" class="form-control col-sm-8" id="dob" name="dob" placeholder="1999-12-12" value="" maxlength="50" required="">
                </div>
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">Date of Joining</label>
                    <input type="text" class="form-control col-sm-8" id="doj" name="doj" placeholder="2000-01-01" value="" maxlength="50" required="">
                </div>
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">Salary</label>
                    <input type="text" class="form-control col-sm-8" id="salary" name="salary" placeholder="99999.99" value="" maxlength="50" required="">
                </div>
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">SSN</label>
                    <input type="text" class="form-control col-sm-8" id="ssn" name="ssn" placeholder="123-456-7890" value="" maxlength="50" required="">
                </div>
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">Phone NO.</label>
                    <input type="text" class="form-control col-sm-8" id="phone" name="phone" placeholder="408-333-3333" value="" maxlength="50" required="">
                </div>
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">City</label>
                    <input type="text" class="form-control col-sm-8" id="city" name="city" placeholder="Enter" value="" maxlength="50" required="">
                </div>
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">State</label>
                    <input type="text" class="form-control col-sm-8" id="state" name="state" placeholder="CA" value="" maxlength="2" required="">
                </div>
                <div class="form-row">
                <label for="name" class="col-sm-4 control-label">ZIP</label>
                    <input type="text" class="form-control col-sm-8" id="zip" name="zip" placeholder="91234" value="" maxlength="10" required="">
                </div>
            </div>
            <div class="col-sm-offset-2 col-sm-10">
             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
             </button>
            </div>
        </form>
    </div>
    <div class="modal-footer">

    </div>
</div>
</div>
</div>
</div>
<script id="details-template" type="text/x-handlebars-template">
    @verbatim
    <table class="table">
        <tr>
            <td>Employee ID:</td>
            <td>{{emp_id}}</td>
            <td>Name Prefix:</td>
            <td>{{name_prefix}}</td>
            <td>Middle Initial:</td>
            <td>{{middle_initial}}</td>
            <td>Mother's Name</td>
            <td>{{mothers_name}}
            <td>Father's Name</td>
            <td>{{fathers_name}}</td>
        </tr>
        <tr>
    <td>Mother's Maiden Name</td>
    <td>{{mothers_maiden_name}}</td>
    <td>Gender</td>
    <td>{{gender}}</td>
    <td>Email</td>
    <td>{{email}}</td>
    <td>DOB</td>
    <td>{{dob}}</td>
    <td>Date of Joining</td>
    <td>{{doj}}</td>
        </tr>
        <tr>
    <td>Salary</td>
    <td>{{salary}}</td>
    <td>Phone No.</td>
    <td>{{phone}}</td>
    <td>City</td>
    <td>{{city}}</td>
    <td>State</td>
    <td>{{state}}</td>
    <td>zip</td>
    <td>{{zip}}</td>
</tr>
    </table>
    @endverbatim
</script>

<script>
var SITEURL = '{{URL::to('')}}';
  $(document).ready(function() {
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
   var template = Handlebars.compile($("#details-template").html());
var table =  $('#employees-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.employees') !!}',
        columns: [
            { data: 'id', name: 'id', orderable: false, searchable: false },
            {
                "className":      'details-control',
                "orderable":      true,
                "searchable":     true,
                "data":           'first_name',
                "defaultContent": ''
            },
            {
                "className":      'details-control',
                "orderable":      true,
                "searchable":     true,
                "data":           'last_name',
                "defaultContent": ''
            },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

  $('#employees-table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( template(row.data()) ).show();
            tr.addClass('shown');
        }
    });
/*  When user click add user button */
    $('#create-new-product').click(function () {
        $('#btn-save').val("create-product");
        $('#product_id').val('');
        $('#productForm').trigger("reset");
        $('#productCrudModal').html("Add New Employee");
        $('#ajax-product-modal').modal('show');
    });

   /* When click edit user */
    $('body').on('click', '.edit-product', function () {
      var product_id = $(this).data('id');
      $.get('/employee/' + product_id +'/edit', function (data) {
         $('#title-error').hide();
         $('#product_code-error').hide();
         $('#description-error').hide();
         $('#productCrudModal').html("Edit Employee");
        $('#product_id').val(data.id);
          $('#btn-save').val("edit-product");
          $('#ajax-product-modal').modal('show');
          $('#emp_id').val(data.emp_id);
          $('#name_prefix').val(data.name_prefix);
          $('#first_name').val(data.first_name);
          $('#last_name').val(data.last_name);
          $('#middle_initial').val(data.middle_initial);
          $('#gender').val(data.gender);
          $('#fathers_name').val(data.fathers_name);
          $('#mothers_name').val(data.mothers_name);
          $('#mothers_maiden_name').val(data.mothers_maiden_name);
          $('#email').val(data.email);
          $('#dob').val(data.dob);
          $('#doj').val(data.doj);
          $('#salary').val(data.salary);
          $('#ssn').val(data.ssn);
          $('#phone').val(data.phone);
          $('#city').val(data.city);
          $('#state').val(data.state);
          $('#zip').val(data.zip);
      })
   });

    $('body').on('click', '#delete-product', function () {

        var product_id = $(this).data("id");

        if(confirm("Are You sure want to delete !")){
          $.ajax({
              type: "get",
              url: SITEURL + "/employee/delete/"+product_id,
              success: function (data) {
              var oTable = $('#employees-table').dataTable();
              oTable.fnDraw(false);
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
        }
    });
});
if ($("#productForm").length > 0) {
      $("#productForm").validate({

     submitHandler: function(form) {

      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');

      $.ajax({
          data: $('#productForm').serialize(),
          url: SITEURL + "/employee/store",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#productForm').trigger("reset");
              $('#ajax-product-modal').modal('hide');
              $('#btn-save').html('Save Changes');
              var oTable = $('#laravel_datatable').dataTable();
              oTable.fnDraw(false);

          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
          }
      });
    }
  })
}
</script>
</body>
</html>
