function goToPage(pageNo) {
  pageLoad(pageNo);
}

function updateData(id) {
  pageNo = $("#pageNo").val();
  $.ajax({
    url: "read.php",
    type: "POST",
    data: {id : id, pageNo: pageNo},
    success: function(result) {
      $("table").html("");
      $(".pagination").html("");
      $("table").html(result);
    }
  })
}

function deleteData(id) {
  pageNo = $("#pageNo").val();
  $.ajax({
    url: "delete.php",
    type: "POST",
    data: {id : id, pageNo: pageNo},
    success: function(result) {
      if(result == "Deleted") {
        pageLoad(pageNo);
        $("#msg").html("Data Deleted Succefully");
      }
    }
  })
  
}

function pageLoad(pageNo) {
  $.ajax({
    url: "read.php",
    type: "POST",
    data: {pageNo: pageNo},
    success: function(result) {
      $("table").html("");
      $(".pagination").html("");
      $("table").html(result);
    }
  })
}