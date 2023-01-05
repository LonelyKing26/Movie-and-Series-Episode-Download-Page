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
<div class="container text-center mt-5 mb-5">
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
                    <div class="alert alert-success">Successfully Added!</div>
                    <p>Get Link - <a href="https://'.$_SERVER['SERVER_NAME'].'/get.php?eps='.$slug.'" id="link">https://'.$_SERVER['SERVER_NAME'].'/get.php?eps='.$slug.'</a></p>
                    <button class="btn btn-primary" id="copyboard" onclick="myFunction()">Copy</button>
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
</div>
       
            <?php
            //    $a = "https://codesource.io/";

            //    $domain = parse_url($a);
               
            //    echo $a;
            //    echo "The domain is ".$domain['host'];
            ?>

            <input type="text" data-id="slug" hidden value="<?php echo $slug;?>">
    <!-- <script src="assets/js/bootstrap.min.js"></script>-->
    <script src="assets/js/jquery-3.6.0.min.js"></script> 
    <link href="https://cdn.quilljs.com/1.2.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.2.6/quill.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include('footer.php');?>

    <script>
        function myFunction() {
        var copyText = document.getElementById("copyboard");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        
        // var tooltip = document.getElementById("myTooltip");
        // tooltip.innerHTML = "Copied: " + copyText.value;
        }
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