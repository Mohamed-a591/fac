<?php
    session_start();
    $title='login';
    $message="";
    if(isset($_SESSION['user']))
    {
        header('Location:home.php');
        exit();
    }

    include"inc/conection.php";
    include"inc/templets/header.php";

    $name='';
    $password='';

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $name    = $_POST['name'];
        $password= $_POST['pass'];
        $slc = $con->prepare("SELECT * FROM users WHERE username=? AND password=?");
        $slc ->execute(array($name,$password));
        $data= $slc->fetch();
        $cont = $slc->rowCount();
        if($cont>0)
        {
            $_SESSION['user']=$name;
            $_SESSION['id']  =$data['id'];
            $_SESSION['img'] =$data['img'];
            header('Location: home.php');
            exit();
        }
        else
        {
            $message="you don't have an acount";
        }
        
        
        
    }
?>

<div class=" container">
    <div class="row">
        <div class=" col-lg-6 col-md-8 col-sm-12 my-5 mx-auto  m-4 ">
            <form class=" p-4 border border-dark login " action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <h1 class="text-center">Login Form</h1>
                <hr class="bg-dark">
                <div class=" form-group">
                    <lable>user name</lable>
                    <input type="text" class=" form-control" name="name">
                </div>
                <div class=" form-group">
                    <lable>password</lable>
                    <input type="password" class=" form-control" name="pass">
                </div>
                <?php if($message=="you don't have an acount"):?>
                    <div class="alert alert-danger"><?= $message; ?></div>
                <?php endif ;?>
                <input type="submit" value="login" class="btn btn-block btn-primary">
                <a href="singin.php" class="offset-4 btn btn-link">Creat new acount</a>
            </form>
        </div>
    </div>
</div>    


<?php
    include"inc/templets/foter.php";
?>