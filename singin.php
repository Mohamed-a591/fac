<?php
$title='sign in';
$message='';
include"inc/conection.php";
include"inc/templets/header.php";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name    =$_POST['name'];
    $password=$_POST['pass'];
    $img     =$_POST['img'];
    if(empty( $name) || empty($password))
    {
        $message='the filed is empty';
    }
    else
    {
        $stm=$con->prepare("INSERT INTO users(username , password ,img) VALUES (:username ,:password ,:img)");
        if($stm->execute(array('username'=>$name,'password'=>$password ,'img'=>$img)))
        {
            $message='the data inserted successfuly';
            header("Location:index.php");
            exit();
        }
        
    }
}
?>

<div class=" container">
    <div class="row">
        <div class=" col-lg-6 col-md-8 col-sm-12 mx-auto my-5  m-4 ">
            <form class=" p-4 border border-dark login " action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <h1 class="text-center">Sign In</h1>
                <hr class="bg-dark">
                <div class=" form-group">
                    <lable>user name</lable>
                    <input type="text" class=" form-control" name="name">
                </div>
                <div class=" form-group">
                    <lable>password</lable>
                    <input type="password" class=" form-control" name="pass">
                </div>
                <div class=" form-group">
                    <label>choose a img</label>
                    <input type="file" class="form-control-file" name="img">
                </div>
                <?php if($message=='the filed is empty'):?>
                    <div class="alert alert-danger"><?= $message; ?></div>
                <?php endif ;?>
                <?php if($message=='the data inserted successfuly'):?>
                    <div class="alert alert-success"><?= $message; ?></div>
                <?php endif ;?>
                <input type="submit" value="sign in" class="btn btn-block btn-primary">
                <a href="index.php" class="offset-4 btn btn-link">I have an acount</a>
            </form>
        </div>
    </div>
</div>    








<?php include"inc/templets/foter.php"; ?>