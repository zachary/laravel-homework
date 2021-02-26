@extends('layouts.app')

@section('content')
<div class="container">
<br><br>
    <table class="table table-bordered" id="employees-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
<th>Last Name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
    </table>
    <div class="modal-footer">

    </div>
</div>
@stop
@push('scripts')

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
});
</script>
@endpush
