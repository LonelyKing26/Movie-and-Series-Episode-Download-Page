<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php include('../header.php');?>
    <section class="container">
           
            <!-- <div class="img">
                <img src="https://www.pngkey.com/png/full/989-9892802_batman-batman-black-and-white-face.png"  width="150px" alt="Img">
            </div> -->
            <?php
            if(isset($_GET['db'])){
                echo'
                    <div class="heading mt-5 text-center">
                        <h2>
                            Install Database
                        </h2>
                    </div>
                    <form action="" method="get" class="form col-lg-8 m-auto">
                        <div class="from-group pt-4">
                            <label for="#server">Server</label>
                            <input type="text" name="server" id="server" class="form-control" placeholder="localhost">
                        </div>
                        <div class="from-group pt-4">
                            <label for="#dbuser">Database User</label> <small></small>
                            <input type="text" name="dbuser" id="dbuser" class="form-control">
                        </div>
                        <div class="from-group pt-4">
                            <label for="#dbpass">Database User Password</label> <small></small>
                            <input type="text" name="dbpass" id="dbpass" class="form-control">
                        </div>
                        <div class="from-group pt-4">
                            <label for="#dbname">Database Name</label> <small></small>
                            <input type="text" name="dbname" id="dbname" class="form-control">
                        </div>
                            <div class="submit text-center">
                            <input type="submit" id="submit" class="btn btn-primary mt-4" value="Next">
                        </div>
                    </form>
                ';
            }
            if(isset($_GET['server'])){
                $file = "../config.php";
                $server = $_GET['server'];
                $dbuser = $_GET['dbuser'];
                $dbpass = $_GET['dbpass'];
                $dbname = $_GET['dbname'];

                $str=file_get_contents($file);
                $old = ["serverhost","dbuser","dbpass","dbname"];
                $new = ["$server","$dbuser","$dbpass","$dbname"];
                $strreplace=str_replace($old, $new,$str);
                
                file_put_contents($file, $strreplace);

                echo'
                    <div class="heading mt-5 text-center">
                        <h2>
                            Admin Details
                        </h2>
                    </div>
                    <form action="" method="get" class="form col-lg-8 m-auto">
                        <div class="from-group pt-4">
                            <label for="#username">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="from-group pt-4">
                            <label for="#email">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="from-group pt-4">
                            <label for="#admin_pass">Admin Password</label> <small></small>
                            <input type="text" name="admin_pass" id="admin_pass" class="form-control">
                        </div>
                            <div class="submit text-center">
                            <input type="submit" id="submit" class="btn btn-primary mt-4" value="Next">
                        </div>
                    </form>
                ';
            }
            if(isset($_GET['username'])){
                include("../config.php");
                $username = $_GET['username'];
                $admin_pass = $_GET['admin_pass'];
                $email = $_GET['email'];
                $enc = md5($admin_pass);
                $sql = mysqli_query($conn, "INSERT INTO admin_data (username, password, status, email) VALUES ('$username','$enc','Active','$email')");

                echo'
                    <div class="heading mt-5 text-center">
                        <h2>
                           Site Details
                        </h2>
                    </div>
                    <form action="" method="get" class="form col-lg-8 m-auto">
                        <div class="from-group pt-4">
                            <label for="#sitename">Site Name</label>
                            <input type="text" name="sitename" id="sitename" class="form-control" placeholder="Example">
                        </div>
                        <div class="from-group pt-4">
                            <label for="#siteurl">Site URL</label> <small></small>
                            <input type="text" name="siteurl" id="siteurl" class="form-control" placeholder="https://example.com/">
                        </div>
                            <div class="submit text-center">
                            <input type="submit" id="submit" class="btn btn-primary mt-4" value="Install">
                        </div>
                    </form>
                ';
            }
            if(isset($_GET['sitename'])){
                include("../config.php");
                $sitename = $_GET['sitename'];
                $siteurl = $_GET['siteurl'];
                $sql = mysqli_query($conn, "INSERT INTO site_data (site_name, site_url) VALUES ('$sitename','$siteurl')");

                echo'
                <div class="heading mt-5 text-center">
                    <h2>
                       Hooreyyyy.! All Done.!!
                    </h2>
                </div>
                <div class="notice text-center">
                    <div class="alert alert-success mt-5">Successfully Installed! Now Portal is Ready to Use</div>
                    <a href="../login.php">
                        <button class="btn btn-dark mt-5 text-center m-auto">Login to Portal</button>
                    </a>
                    <p class="mt-5 text-center m-auto"><b>Note: <span style="color:red;"> Please Delete install folder</span></b></p>
                </div>
            ';
            }

            ?>
         
    </section>
            <?php
                $n=6;
                function getName($n) {
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $randomString = '';
                    
                    for ($i = 0; $i < $n; $i++) {
                        $index = rand(0, strlen($characters) - 1);
                        $randomString .= $characters[$index];
                    }
                    
                    return $randomString;
                }
                    
                $slug = getName($n);

                
            ?>
            <input type="text" id="slug" hidden value="<?php echo $slug;?>">
    <!-- <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script> -->
    <link href="https://cdn.quilljs.com/1.2.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.2.6/quill.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include('../footer.php');?>

    <script>
        var quill = new Quill('#editr', {
        modules: {
            toolbar: true
        },
        theme: 'snow'
        });
    </script>
    <script>
        
        $(document).ready(function(){
            $("#add-row").click(function(){
                $(".download-watch").append();
            })
            $("#submit").click(function(){
                var title = $("#title").val();
                var slug = $("#slug").val();
                var editr = $('.ql-editor').html();
                
                if(title == ""){
                    Swal.fire(
                            'Title Empty.!',
                            'Please Fill Title',
                            'error'
                            )
                }
                else if (editr == '<p><br></p>'){
                    Swal.fire(
                            'Content Empty.!',
                            'Please Fill Content',
                            'error'
                            )
                }
                else{
                    var fd = new FormData();

                    fd.append("title", title);
                    fd.append("editr", editr);
                    fd.append("slug", slug);
                    $.ajax({
                        url: 'ajax/texthost.php',
                        type: 'post',
                        contentType: false,
                        processData:false,
                        data: fd,
                        success: function(response){
                            var data = JSON.parse(response);
                            console.log(data);
                            if(data.status == 'success'){

                                Swal.fire(
                                'Success',
                                'Your Text is Posted',
                                'success'
                                ).then(function(){ window.location = 'get.php?file='+slug;});

                            }
                            else{
                                Swal.fire(
                                'Error',
                                'Somting Error, Contact Admin',
                                'error'
                                )
                            }
                        }
                    });
                }
            });
        });
        
    </script>
</body>
</html>