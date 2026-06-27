<?php
//database conection  file
include('dbconnection.php');
//Code for deletion
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql=mysqli_query($con,"delete from tblusers where ID=$rid");
echo "<script>alert('Data deleted');</script>"; 
echo "<script>window.location.href = 'index.php'</script>";     
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Elegant Table Design</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: 'Roboto', sans-serif;
  background: #f4f6f9;
  padding-top: 40px;
}
.table-wrapper {
  max-width: 1100px;
  margin: 0 auto;
  background: #fff;
  padding: 25px;
  border-radius: 6px;
  box-shadow: 0 1px 5px rgba(0,0,0,0.1);
}
.table-title {
  margin-bottom: 20px;
}
.btn-add {
  float: right;
}
</style>
</head>
<body>

<div class="table-wrapper">
  <div class="table-title clearfix">
    <h2 class="float-left">Users List</h2>
    <a href="insert.php" class="btn btn-success btn-add float-right">
      <i class="fa fa-plus"></i> Add New User
    </a>
  </div>

  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Mobile Number</th>
        <th>Email</th>
        <th>Address</th>
        <th>Created On</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = mysqli_query($con, "select * from tblusers order by ID desc");
      if (mysqli_num_rows($sql) > 0) {
        while ($row = mysqli_fetch_assoc($sql)) {
      ?>
      <tr>
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo htmlspecialchars($row['FirstName']); ?></td>
        <td><?php echo htmlspecialchars($row['LastName']); ?></td>
        <td><?php echo htmlspecialchars($row['MobileNumber']); ?></td>
        <td><?php echo htmlspecialchars($row['Email']); ?></td>
        <td><?php echo htmlspecialchars($row['Address']); ?></td>
        <td><?php echo $row['CreationDate']; ?></td>
        <td>
          <a href="read.php?viewid=<?php echo $row['ID']; ?>" class="btn btn-info btn-sm">
            <i class="fa fa-eye"></i> View
          </a>
          <a href="edit.php?editid=<?php echo $row['ID']; ?>" class="btn btn-warning btn-sm">
            <i class="fa fa-pencil"></i> Edit
          </a>
          <a href="index.php?delid=<?php echo $row['ID']; ?>" class="btn btn-danger btn-sm"
             onclick="return confirm('Are you sure you want to delete this record?');">
            <i class="fa fa-trash"></i> Delete
          </a>
        </td>
      </tr>
      <?php
        }
      } else {
        echo "<tr><td colspan='8' class='text-center'>No records found</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>