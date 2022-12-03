<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie and Episode Downloading Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php include('header.php');?>
    <!-- <section class="container">
        <div class="heading mt-5 text-center">
            <h2>
                Movie and Episodes Downloading Page
            </h2>
        </div>
        <div class="main-content my-5">
            <div class="quality">
                <h3>
                    480p
                </h3>
            </div>
            <div class="480-btn">
                <button class="btn btn-primary">
                    Download 480p
                </button>
            </div>
        </div>
    </section> -->
        <?php
            $db = mysqli_connect('localhost','root','','mvdl');
            if(isset($_POST['save'])){
                $url = $_POST['url'];
                $size = $_POST['size'];
                $title = $_POST['title'];
                $audio = $_POST['audio'];
                $quality = $_POST['quality'];
                $resolution = $_POST['resolution'];
                $format = $_POST['format'];    
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

                $sql = "INSERT INTO post_data (post_title, audio, quality, status, slug)VALUES('".$title."','".$audio."','".$quality."','Active','$slug')";
                    $result = mysqli_query($db, $sql);
                $post_id = mysqli_insert_id($db);

                foreach($url as $key => $value){
                
                    $query = "INSERT INTO link_data (url, post_id, size, resolution, format, status)VALUES('".$value."','".$post_id."','".$size[$key]."','".$resolution[$key]."','".$format[$key]."','Active')";
                    $result = mysqli_query($db, $query);
                }
                echo '
                    <div class="alert alert-success">Query Successfully Added!</div>
                    <p>Get Link - https://'.$_SERVER['SERVER_NAME'].'/get.php?eps='.$slug.'</p>
                ';
            }
            
        ?>
            <?php
            
            if(isset($_GET['eps'])){
                $ep = $_GET['eps'];

               $sql = "SELECT * FROM post_data, link_data
                 WHERE slug LIKE '%".$ep."%'
                ";
                $reslut = mysqli_query($conn, $sql);
                $get_eps = mysqli_fetch_assoc($reslut);
                
                // echo $get_eps['post_title'];
            }  
            
            ?>
            <?php
               $a = "https://codesource.io/";

               $domain = parse_url($a);
               
               echo $a;
               echo "The domain is ".$domain['host'];
            ?>
            <section class="container quality-container text-center">
                <div class="title text-cenet mt-5 mb-5">
                    <h3>
                        Avengers Assemble S01E03
                    </h3>
                </div>
                <div class="sec-bar">
                    <h3>
                        info ---------------
                    </h3>
                </div>
                <div class="info col-lg-12 col-sm-12">
                    <table class="table table-borderless col-lg-6 col-sm-12 col-xs-12">
                        <tr>
                            <td>
                                <b>Title:</b>
                            </td>
                            <td>
                                    Avengers Assemble S01E03
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Audio:</b>
                            </td>
                            <td>
                                   Tamil eng Tel bla blablaa
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Quality:</b>
                            </td>
                            <td>
                                    720p 1080p
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Size:</b>
                            </td>
                            <td>
                                    1GB
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Views:</b>
                            </td>
                            <td>
                                    112
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="sec-bar mb-3 mt-3">
                    <h3>
                        Download -----------
                    </h3>
                </div>
                <div class="content">
                    <div class="4k">
                        <div class="sec-head">
                            4k Content
                        </div>
                        <div class="sec-content">
                            <div class="row">
                                <div class="download-btn">
                                    <a href="#">
                                        <button class="btn btn-primary">Download</button>
                                    </a>
                                </div>
                                <div class="download-btn">
                                    <a href="#">
                                        <button class="btn btn-primary">Download</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="4k">
                        <div class="sec-head ">
                            1080 Content
                        </div>
                        <div class="sec-content">
                            <div class="row col-sm-12">
                                <div class="download-btn col-sm-2  mt-3">
                                    <a href="#">
                                        <button class="btn btn-warning">Download</button>
                                    </a>
                                </div>
                                <div class="download-btn col-sm-2  mt-3">
                                    <a href="#">
                                        <button class="btn btn-primary">Download</button>
                                    </a>
                                </div>
                                <div class="download-btn col-sm-2  mt-3">
                                    <a href="#">
                                        <button class="btn btn-warning">Download</button>
                                    </a>
                                </div>
                                <div class="download-btn col-sm-2  mt-3">
                                    <a href="#">
                                        <button class="btn btn-warning">Download</button>
                                    </a>
                                </div>
                                <div class="download-btn col-sm-2  mt-3">
                                    <a href="#">
                                        <button class="btn btn-primary">Download</button>
                                    </a>
                                </div>
                                <div class="download-btn col-sm-2  mt-3">
                                    <a href="#">
                                        <button class="btn btn-primary">Download</button>
                                    </a>
                                </div>
                                <div class="download-btn col-sm-2  mt-3">
                                    <a href="#">
                                        <button class="btn btn-primary">Download</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="4k">
                        <div class="sec-head">
                            720 Content
                        </div>
                        <div class="sec-content">
                            <div class="row">
                                <div class="download-btn">
                                    <a href="#">
                                        <button class="btn btn-primary">Download</button>
                                    </a>
                                </div>
                                <div class="download-btn">
                                    <a href="#">
                                        <button class="btn btn-primary">Download</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="4k">
                        <div class="sec-head">
                            480 Content
                        </div>
                        <div class="sec-content">
                            <div class="row">
                                <div class="download-btn">
                                    <a href="#">
                                        <button class="btn btn-primary">Download</button>
                                    </a>
                                </div>
                                <div class="download-btn">
                                    <a href="#">
                                        <button class="btn btn-primary">Download</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </section>
            <input type="text" data-id="slug" hidden value="<?php echo $slug;?>">
    <!-- <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script> -->
    <link href="https://cdn.quilljs.com/1.2.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.2.6/quill.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include('footer.php');?>

    <script>
        // var quill = new Quill('#editr', {
        // modules: {
        //     toolbar: true
        // },
        // theme: 'snow'
        // });
    </script>
    <script>
        // function makeid() {
        //     var text = "";
        //     var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        //     for (var i = 0; i < 5; i++)
        //         text += possible.charAt(Math.floor(Math.random() * possible.length));

        //     return text;
        //     }
//         const genRand = (len) => {
//   return Math.random().toString(36).substring(2,len+2);
// }

// console.log(genRand(8));
        $(document).ready(function(){
            $("#add-row").click(function(){
                $(".testingo").clone().appendTo( $("#main")).removeClass("testingo d-none");
            });
            $("#submit").click(function(){
                var id = $('.form-control').map(function(){
                    return this.id;
                }).get();
                console.log(id);
                // var url = $("#url").val();
                               
                // if(title == ""){
                //     Swal.fire(
                //             'Title Empty.!',
                //             'Please Fill Title',
                //             'error'
                //             )
                // }
                // else if (editr == '<p><br></p>'){
                //     Swal.fire(
                //             'Content Empty.!',
                //             'Please Fill Content',
                //             'error'
                //             )
                // }
                // else{
                //     var fd = new FormData();

                //     fd.append("title", title);
                //     fd.append("editr", editr);
                //     fd.append("slug", slug);
                //     $.ajax({
                //         url: 'ajax/texthost.php',
                //         type: 'post',
                //         contentType: false,
                //         processData:false,
                //         data: fd,
                //         success: function(response){
                //             var data = JSON.parse(response);
                //             console.log(data);
                //             if(data.status == 'success'){

                //                 Swal.fire(
                //                 'Success',
                //                 'Your Text is Posted',
                //                 'success'
                //                 ).then(function(){ window.location = 'get.php?file='+slug;});

                //             }
                //             else{
                //                 Swal.fire(
                //                 'Error',
                //                 'Somting Error, Contact Admin',
                //                 'error'
                //                 )
                //             }
                //         }
                //     });
                // }
            });
        });
        
    </script>
</body>
</html>