<?php 
    include('parts/header.php');

    unset($_SESSION['auth']);
    unset($_SESSION['manager']);
    header('Location: /admin/auth.php');
    
?>


<?php include('parts/footer.php');?>