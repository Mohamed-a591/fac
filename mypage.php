<?php
    session_start();
    $title='personal page';
    include"inc/conection.php";
    include"inc/templets/header.php";
    include"inc/templets/navbar.php";

    if(isset($_GET['delet']))
    {
        $delet=$con->prepare("DELETE FROM posts WHERE id=?");
        $delet->execute(array($_GET['id']));
    }
    
    
    //$stm=$con->prepare("SELECT * FROM posts JOIN users ON users.id=posts.user_id WHERE users.id=? ");
    $stm=$con->prepare("SELECT * FROM posts WHERE user_id=? ");
    $stm->execute(array($_SESSION['id']));
    $post=$stm->fetchAll();?>
        <div class="container pt-3">
            <p class="text-center h4 mb-3">Welcome <?php echo $_SESSION['user']; ?></p>
        <?php foreach($post as $info):?>
            <div class="row">
                <div class="col-lg-8 col-md-10 col-11 border border-secondary mb-1 mx-auto rounded p-1 pb-3 shadow">
                    <i><img src="layout/img/<?php echo $_SESSION['img'];?>" width="30" height="30" class=" rounded-circle  mt-2 "></i>
                    <h4 class="d-inline ml-1 position-absolute pt-2"><?php echo $_SESSION['user'];?></h4>
                    <hr class="bg-info">
                    <p class="bg-white form-control px-2 py-3"><?php echo $info['posts']  ?></p>
                    <a class="btn btn-danger ml-3 col-3 " type="button" name="delet" href="mypage.php?delet&id=<?php echo $info['id'];?>" > delet</a>
                    <!--<a class="btn btn-success ml-3 col-3 " type="button" name="edit" href="mypage.php?edit&id=<?php //echo $info['id'];?>" >edit</a>-->
                </div>
            </div>
        <?php endforeach; ?>    
        </div>
        
       
    





<?php
    include"inc/templets/foter.php";
?>