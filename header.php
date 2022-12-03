<!-- <header class="header">
        <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
            <div class="container">
                <a href="#" class="navbar-brand">TextHost</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsenav">
                <span class="navbar-toggler-icon"></span>
                </button>   
                <div class="row" style="    justify-content: right;">
                       <table>
                            <td>
                                <input type="button" value="Add" class="btn btn-small btn-danger">
                            </td>
                            <td>
                                <input type="button" value="Guest" class="btn btn-small btn-danger">
                            </td>
                       </table>
                </div>
            </div>
        </nav>
    </header> -->
    <?php include("config.php")?>

    <div class="heading mt-5 text-center mb-5">
            <?php 
                $sql = "SELECT * FROM site_data LIMIT 1";
                $result = mysqli_query($conn, $sql);
                $site_data = mysqli_fetch_assoc($result);
            ?>
            <h2>
                <?php echo $site_data['site_name'];?>
            </h2>
        </div>