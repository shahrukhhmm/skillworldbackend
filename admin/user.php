<?php include "header.php";?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10 mt-5">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2 mt-5">
                  <a class="btn btn-primary" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12 mt-5">
                <?php
                  include "config.php";                
                  $sql = "SELECT * FROM user ORDER BY id DESC ";
                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                          // $serial = $offset + 1;
                          while($row = mysqli_fetch_assoc($result)) {
                        ?>
                          <tr>
                              <td class='id'><?php echo $row['id'] ?></td>
                              <td><?php echo $row['fullname'] . " ". $row['lastname']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                             
                              <td class='d-flex flex-column align-items-center'><a href='update-user.php?id=<?php echo $row["id"]; ?>'><i class='fa fa-edit'></i></a></td>
                              <td ><a href='delete-user.php?id=<?php echo $row["id"]; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                        <?php
                          
                        } ?>
                      </tbody>
                  </table>
                  <?php
                  }
                else {
                  echo "<h3>No Results Found.</h3>";
                }
             ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
