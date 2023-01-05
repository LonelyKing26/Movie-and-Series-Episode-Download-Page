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
    <section class="container">
        
        
        <form action="result.php" method="post">
            <div class="from-group pt-4">
                <label for="#title">Title</label> <small>(max 100)</small>
                <input type="text" name="title" data-id="title" class="form-control" style="width: 98%;">
            </div>
            <div class="row pt-4 col-sm-12">
                <div class="from-group col-sm-8">
                    <label for="#title">Audio</label> <small></small>
                    <input type="text" name="audio" data-id="audio" class="form-control">
                </div>
                <div class="col-sm-4 from-group quality">
                    <label for="#quality">Quality</label> <small></small>
                    <select name="quality" data-id="quality" class="form-control">
                        <option value="bluray">Blu-Ray</option>
                        <option value="hd">HD</option>
                        <option value="webrip">WEBRip</option>
                        <option value="webdl">WEB_DL</option>
                        <option value="cam">CAM</option>
                        <option value="tv">TvRip</option>
                    </select>
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-sm-8 col-xs-9 d-inline-block">
                    <h4>Download/Watch Online</h4>
                </div>
                <div class="col-sm-4 col-xs-3 d-inline-block" style="margin-top:-15px; text-align:right;">
                    <input id="add-row" class="btn add-row" value="Add More">
                </div>
            </div>
                <div class="download-watch" id="main">
                    <div class="row download-row">
                        <div class="col-sm-4 from-group pt-4">
                            <label for="#title">URL</label> <small></small>
                            <input type="text" name="url[]" class="url form-control" placeholder="youtube.com/watch?=hxxx">
                        </div>
                        
                        <div class="col-sm-2 from-group pt-4">
                            <label for="#resolution">Resolution</label> <small></small>
                            <select name="resolution[]" data-id="resolution" class="form-control">
                                <option value="4k">4k</option>
                                <option value="1080">1080p</option>
                                <option value="720" selected>720p</option>
                                <option value="480">480p</option>
                                <option value="360">360p</option>
                            </select>
                        </div>
                        <div class="col-sm-2 from-group pt-4">
                            <label for="#format">Encode Format</label> <small></small>
                            <select name="format[]" data-id="format" class="form-control">
                                <option value="264">AVC H.264</option>
                                <option value="265">HEVC H.265</option>
                                <option value="avi">AVI Xvid</option>
                                <option value="others">Other</option>
                            </select>
                        </div>
                        <div class="col-sm-2 from-group pt-4">
                            <label for="#size">Video Size</label> <small></small>
                            <input type="text" name="size[]" data-id="size" class="size form-control" placeholder="800MB" style="text-transform: uppercase;">
                        </div>
                        <div class="col-sm-2" style="padding-top: 45px; text-align:right;">
                            <input type="button" id="remove-row" class="btn btn-primary" value="Remove">
                        </div>
                     </div>    
                    <!-- <div class="row">
                        <div class="col-sm-4 from-group pt-4">
                            <label for="#url">URL</label> <small></small>
                            <input type="text" name="url" data-id="url"  class="url form-control" placeholder="https://youtube.com/watch?=hxxx">
                        </div>
                        
                        <div class="col-sm-2 from-group pt-4">
                            <label for="#resolution">Resolution</label> <small></small>
                            <select name="select" data-id="resolution" class="form-control">
                                <option value="4k">4k</option>
                                <option value="1080">1080p</option>
                                <option value="720" selected>720p</option>
                                <option value="480">480p</option>
                                <option value="360">360p</option>
                            </select>
                        </div>
                        <div class="col-sm-3 from-group pt-4">
                            <label for="#format">Encode Format</label> <small></small>
                            <select name="format" data-id="format" class="form-control">
                                <option value="264">AVC H.264</option>
                                <option value="265">HEVC H.265</option>
                                <option value="avi">AVI Xvid</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-sm-3 from-group pt-4">
                            <label for="#size">Video Size</label> <small></small>
                            <input type="text" name="size" data-id="size" class="size form-control" placeholder="800MB" style="text-transform: uppercase ;">
                        </div>
                    </div> -->
                </div>
            <!-- <div class="form-group pt-4">
                <label for="content">Content</label> <small>(max 5000)</small>
                <div data-id="editr" style="height:250px; font-size:16px;color:black;">  
                                        
                <p data-id="content"></p>
                </div>
            </div> -->
            <div class="submit text-center">
                <input type="submit" id="submit" name="save" class="btn btn-primary mt-4" value="Submit">
            </div>
        </from>
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
                $(".download-row").clone().appendTo( $("#main")).removeClass("download-row").addClass("duplicate-row");
            });
            $(document).on('click', "#remove-row", function(){
                $(this).closest('.duplicate-row').remove();
            })
            $("").click(function(){
                
                // var url = $.map($('.url'), function (e, i) {
                // return e.value;
                // });
                // var size = $.map($('.size'), function (e, i) {
                // return e.value;
                // });
                // var url = JSON.stringify(url);
                // var size = JSON.stringify(size);
                    // var url = $(".url").each(function(){
                    // url = $(this).val();
                    // console.log(url);

                    // });
                    // var url = $('input[name="url"]').val();
                    // var size = $('input[name="size"]').val();
                    var url= new Array();
                    $('input[name="url"]').each(function(){
                        url.push($(this).val());
                    })
                    var size= new Array();
                    $('input[name="size"]').each(function(){
                        size.push($(this).val());
                    })
                    console.log(url);
                    var fd = new FormData();

                    fd.append("url", url);
                    fd.append("size", size);
                    
                    $.ajax({
                        url: 'ajax/post_data.php',
                        type: 'post',
                        contentType: false,
                        processData:false,
                        data: fd,
                        success: function(response){
                            // var data = JSON.parse(response);
                            console.log(response);
                            if(response == 'success'){

                                Swal.fire(
                                'Success',
                                'Your Text is Posted',
                                'success'
                                )
                                // .then(function(){ window.location = 'get.php?file='+slug;});
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
                
            });
        });
        
    </script>
</body>
</html>