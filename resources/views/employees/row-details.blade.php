@extends('datatables.template')
@section('demo')
<table id="users-table" class="table table-condensed">
    <thead>
    <tr>
        <th></th>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Created At</th>
        <th>Updated At</th>
    </tr>
    </thead>
</table>
<script id="details-template" type="text/x-handlebars-template">
    <table class="table">
        <tr>
            <td>Employee ID:</td>
            <td>{{emp_id}}</td>
            <td>Name Prefix:</td>
            <td>{{name_prefix}}</td>
            <td>Middle Initial:</td>
            <td>{{middle_initial}}</td>
            <td>Gender:</td>
            <td>{{gender}}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{email}}</td>
            <td>Father's Name:</td>
            <td>{{fathers_name}}</td>
            <td>Mother's Name:</td>
            <td>{{mothers_name}}</td>
            <td>Mother's Maiden Name:</td>
            <td>{{mothers_maiden_name}}</td>
        </tr>
        <tr>
            <td>DOB:</td>
            <td>{{dob}}</td>
            <td>Date of Job:</td>
            <td>{{doj}}</td>
            <td>SSN:</td>
            <td>{{ssn}}</td>
            <td>Salary:</td>
            <td>{{salary}}</td>
        </tr>
        <tr>
            <td>Phone NO:</td>
            <td>{{phone}}</td>
            <td>City:</td>
            <td>{{city}}</td>
            <td>State:</td>
            <td>{{state}}</td>
            <td>ZIP:</td>
            <td>{{zip}}</td>
        </tr>
    </table>
</script>
@endsection

@section('extra')
