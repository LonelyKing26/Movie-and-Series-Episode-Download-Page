<footer class="footer container">
    <div class="row col-lg-12 mt-5">
        <div class="col-lg-12 text-center">
            <?php 
            $sql = "SELECT * FROM site_data LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $site_data = mysqli_fetch_assoc($result);
            ?>
           <?php echo $site_data['site_name'];?> &copy; All Rights Reserved. 
        </div>

    </div>
</footer>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <!-- Designed by Arunpandiyan.in -->