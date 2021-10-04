<table class='table'>
  <thead>
    <th>#</th>
    <th>Name</th>
    <th>Designation</th>
    <th>Actions</th>
  </thead>
  <tbody>


<?php

  require_once './backend/Object.php';
  
  $pageNo = 1;
  $limit = 3;

  if(isset($_POST['pageNo'])) {
    $pageNo = $_POST['pageNo'];
  }

  $current = ($pageNo - 1) * $limit;

  try {
    $records = $obj -> getUsers($current, $limit);
  }
  catch (Exception $e) {
    echo $e -> getMessage();
  }
  
  $data = "";
  $data .= "<tr>";
  $count = 1 + $current;
  foreach ($records as $keys => $record) {
    if ($record['id'] == $_POST['id']) {
      $data .= "<form id='updateForm' class='form-inline' method='post'>";
      $data .= "<td>" . $count . "</td>";
      $data .= '<td><input type="text" name="updateName" id="updateName" value="'.$record['name'].'"></td>';
      $data .= '<td><input type="text" name="updateDesignation" id="updateDesignation" value="'.$record['designation'].'"></td>';
      $data .= '<td>
                  <button id="update" class="btn btn-success">Save</button>
                  <input type="hidden" id="dataId" value="'.$record['id'].'">
                </td>';
      $data .= "</form>";
      $data .= "</tr>";

    }
  
    else {
        $data .= "<td>" . $count . "</td>";
        $data .= "<td>" . $record['name'] . "</td>";
        $data .= "<td>" . $record['designation'] . "</td>";
        $data .= '<td class="controls">
                <button class="btn btn-success" onclick=updateData('.$record['id'].')>Update</button>
                <button class="btn btn-danger" onclick=deleteData('.$record['id'].')>Delete</button>
              </td>';
        $data .= "</tr>";
    }

    $count += 1;
    
  }
  $data .= '<input type="hidden" id="pageNo" value="'.$pageNo.'">';
  echo $data;
?>

  </tbody>
</table>

<?php require_once "pagination.php"; ?>

<script>
  $("#update").click(function() {
    updatename = $('#updateName').val();
    designation = $('#updateDesignation').val();
    updateid = $('#dataId').val();
    pageNo = $("#pageNo").val();
    $.ajax({
      url: "update.php",
      type: "POST",
      data: {name : updatename, designation: designation, updateid: updateid},
      success: function(result) {
        if(result == "success") {
          pageLoad(pageNo);
          $("#msg").html("Data Updated Succefully");
        }
        else {
          $("#msg").html("Something Went Wrong");
        }
        
      }
    })
  });

  
</script>
