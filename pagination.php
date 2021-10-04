<div class="pagination">

  <?php
    $start = 1;

    if(isset($_POST['pageNo'])) {
      $start = $_POST['pageNo'];
    }

    try {
      $pages = $obj -> getPages(3);
    }
    catch (Exception $e) {
      echo $e -> getMessage();
    }

    for($page = 1; $page <= $pages; $page++) {

      if($page == $start) {
        echo "<button class='active m-2' onclick=goToPage($page)>$page</button>";
      }
      else {
        echo "<button class='m-2' onclick=goToPage($page)>$page</button>";
      }
    }
  ?>
</div>