<div class="row well">
        <div class="col-md-4">
            <div class="card well">
                <div class="card-header">
                    <h3 class="">Tambah User</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">                        
                        <div class="mb-3 mt-3">
                            <label for="username" class="form-label">Nama:</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter Name" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Level<span style="color: red;"> *</span></label>
                            <select class="form-control" name="level" id="level">
                                <option value="">Pilih Level</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Petugas">Petugas</option>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
    include_once("koneksi/koneksi.php");
    if(isset($_POST['submit'])) {
        $username= $_POST['username'];
        $password = md5($_POST['password']);
        $level= $_POST['level'];
		
		// Insert user data into table
		$result = mysqli_query($con, "INSERT INTO user (username, password, level) VALUES('$username','$password', '$level')");		
		// Show message when user added
		echo "User added successfully. <a href='index.php?page=user'>View Users</a>";
	} 
?>