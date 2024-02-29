<?php
include_once("koneksi/koneksi.php");
 
if(isset($_POST['update']))
{	
	$id = $_GET['id'];
	
	$name=$_POST['username'];
	$password= md5($_POST['password']);
    $level=$_POST['level'];

	// update user data
	$result = mysqli_query($con, "UPDATE user SET Username='$name', Password='$password', level='$level' WHERE UserID=$id");
	
	header("Location: index.php?page=user");
    echo "<script>alert('berhasil')</script>";
}


$id = $_GET['id'];

$result1 = mysqli_query($con, "SELECT * FROM user WHERE UserID=$id");
 
while($user_data = mysqli_fetch_array($result1))
{
	$name = $user_data['Username'];
	$password = $user_data['Password'];
    $level = $user_data['level'];
}
?>

<div class="row well">
        <div class="col-md-4">
            <div class="card well">
                <div class="card-header">
                    <h3 class="">Update User</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        
                        <div class="mb-3 mt-3">
                            <label for="username" class="form-label">Nama:</label>
                            <input type="text" class="form-control" id="username" value="<?php echo $name; ?>" placeholder="Enter Name" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" value="<?php echo $password; ?>" placeholder="Enter password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Level<span style="color: red;"> *</span></label>
                            <select class="form-control" name="level" id="level">
                                <option value=""><?php echo $level; ?></option>
                                <option value="Administator">Administator</option>
                                <option value="Petugas">Petugas</option>
                            </select>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>