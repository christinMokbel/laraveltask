<!-- session3 -->
<?php
    if(isset($_POST['logged'])){
        $email=$_POST['email'];
        $password=$_POST['pwd'];
        echo 'email is '. $email.' '.'</br>'.'password is '. $password;
    }
?>
