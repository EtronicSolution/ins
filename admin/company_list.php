<?php
include_once './header.php';
include_once './sidebar.php';
include_once './data/company_list_data.php';
if (!empty($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = '';
}
if ($error == 5) {
    echo '<script>  swal("Sucessfully Added", "Please click to update", "success");</script>';
}
if ($error == 4) {
    echo '<script>  swal("Company Name already taken", "Please try again !", "error");</script>';
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="page-wrapper">
  <!-- Main content -->

  <!-- /.Tab content -->
  <section>
    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h3 class="text-primary" style="text-transform: uppercase;"> LIST</h3>
      </div>
      <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0)">Companies</a></li>
          <li class="breadcrumb-item active">List</li>
        </ol>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-body">
              <h4 class="card-title" style="text-transform: uppercase;">Companies LIST</h4>
              <div>

                <div class="col-md-2">
                  <button type="button" class="btn btn-xl  btn-danger" onclick="location.href='company_add.php';">Add New Company</button>
                </div>
              </div>
              <div class="table-responsive m-t-40">
                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>company Code</th>
                        <th>Company Name</th>
                        <th>Register Date</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                  </thead>
                      <tfoot>
                    <tr>
                        <th>#</th>
                         <th>company Code</th>
                        <th>Company Name</th>
                        <th>Register Date</th>
                         <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                  <tbody>
                    <?php
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row['cp_status'] == '1') {
                                    $cp_status = 'Active';
                                } else {
                                    $cp_status = 'Inactive';
                                }
                                 
                     ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                         <td><?php echo $row['cp_code']; ?></td>
                         <td><?php echo $row['cp_name']; ?></td>
                         
                        <td><?php echo $row['cp_registter_day']; ?></td>
                        <td><?php echo $cp_status; ?></td>
                        
                        <td> <button type="button" id="btn_edit" class="btn  btn-sm btn-success" onclick="location.href='company_add.php?cp_id=<?= $row['cp_id']?>';"><i class="ti ti-eye"></i>  Edit</button>
                        
                          
                        <button type="button" id="btn_rm" class="btn  btn-sm btn-danger" onclick="deleteUser();"><i class="ti ti-eraser"></i>  Del</button>
                        
                        </td>
               
                      </tr>

                    <?php
} ?>

                  </tbody>
                
                </table>
              </div>


            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

</div>


<script type="text/javascript">
  function deleteUser(id, tbl, id_name, type) {

    swal({
      title: "Are you sure?",
      text: "Do You want Deactivate  this account",
      icon: "warning",
      buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        swal({
          title: 'Deactivated',
          text: 'Account Sucessfully deactivated',
          icon: 'success'
        }).then(function() {

          var data = {
            id: id,
            tbl: tbl,
            id_name: id_name

          };

          $.ajax({
            type: "POST",
            url: "./data/deleterecords.php",
            dataType: 'json',
            data: data,


            success: function(data) {
              console.log(data);

              if (data.res == 0) {

                window.location.href = "members_list.php?type=" + type;
              } else {

                window.location.href = "members_list.php?error=3";
              }



            }
          });



        });
      } else {
        swal("Cancelled", "User Not Deactivated", "error");
      }
    });

  }



  function activateUser(id, tbl, id_name, type) {

    swal({
      title: "Are you sure?",
      text: "Do You want Activate  this account",
      icon: "warning",
      buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        swal({
          title: 'Activated',
          text: 'Account Sucessfully Activated',
          icon: 'success'
        }).then(function() {

          var data = {
            id: id,
            tbl: tbl,
            id_name: id_name

          };

          $.ajax({
            type: "POST",
            url: "./data/activaterecord.php",
            dataType: 'json',
            data: data,
            success: function(data) {
              console.log(data);

              if (data.res == 0) {

                window.location.href = "members_list.php?type=" + type;
              } else {

                window.location.href = "members_list.php?error=3";
              }



            }
          });



        });
      } else {
        swal("Cancelled", "User Not Deactivated", "error");
      }
    });

  }
</script>



</div>

<?php include_once './footer.php'; ?>