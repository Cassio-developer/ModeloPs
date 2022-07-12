<table id="grid-basic" class="w3-table-all w3-card-4">
    <thead>
      <tr class="w3-cyan">
        <th data-column-id="id" data-type="numeric" data-order="asc">#</th>
        <th data-column-id="first_name" >First Name</th>
        <th data-column-id="last_name" >Last Name</th>
        <th data-column-id="gender" >Gender</th>
        <th data-column-id="email" >Email</th>
        <th data-column-id="country" >Country</th>
        <th data-column-id="salary">Salary</th>
        <th data-column-id="actions" data-formatter="actions" data-sortable="false">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
</table>
<script>
 $("#grid-basic").bootgrid({
             formatters: {
               "actions": function(column, row)
               {
                 return "<button onclick=\"document.getElementById('edit').style.display='block'\" data-id=\"" + row.id + "\" data-first_name=\"" + row.first_name + "\" data-last_name=\"" + row.last_name + "\" data-email=\"" + row.email + "\" data-gender=\"" + row.gender + "\" data-country=\"" + row.country + "\" data-salary=\"" + row.salary + "\" class=\"w3-btn w3-blue w3-small edit\"><span class=\"fa fa-pencil\"></span></button> " +
                 "<button onclick=\"document.getElementById('delete').style.display='block'\" data-first_name=\"" + row.first_name + "\" data-last_name=\"" + row.last_name + "\" data-id=\"" + row.id + "\" class=\"w3-btn w3-blue w3-small delete\"><span class=\"fa fa-remove\"></span></button>";

               }
             }});
             </script>