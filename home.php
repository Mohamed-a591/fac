<?php
    session_start();
    $title='Home page';
    $mypost='';
    $message='';

    if(isset($_SESSION['user']))
    {

    }
    else
    {
        header('Location:index.php');
        exit();
    }
    include"inc/conection.php";
    include"inc/templets/header.php";
    include"inc/templets/navbar.php";
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $mypost=$_POST['mypost'];
        if(empty($_POST['mypost']))
        {
            $message='the post is empty';
        }
        else
        {
            $stm = $con->prepare("INSERT INTO posts(posts , user_id) VALUES (:post,:id)");
            if($stm->execute(array('post'=>$mypost,'id'=>$_SESSION['id'])))
            {
                $message='the post inserted successfuly';
            }
            
            
        }
    }
    
?>





<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-11 mx-auto border border-secondary rounded p-2 m-3 ">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" class="">
                <div class="form-group">
                    <h3 class="pt-1"><img src="layout/img/<?php echo $_SESSION['img']?>" width="40" height="40" class=" rounded-circle mr-2"><?php echo $_SESSION['user']; ?></h3>
                    <hr class="pt-0 bg-info">
                    <?php if($message=='the post is empty'):?>
                        <div class="alert alert-danger"><?= $message; ?></div>
                    <?php endif ;?>
                    <?php if($message=='the post inserted successfuly'):?>
                        <div class="alert alert-success"><?= $message; ?></div>
                    <?php endif ;?>
                </div>
                
                <div class="form-group">
                    <!-- Button trigger modal -->
                    <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" value="Creat post">
                </div>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content px-2">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">write post</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class=" form-group">
                                        <textarea class="form-control" name='mypost' rows="3"></textarea>
                                    </div>
                                </div>
                                
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary form-control"  value="post">
                                    </div>
                                
                            </div>
                        </div>
                    </div>

                
            </form>
        </div>
    </div>

    <?php
    $stm=$con->prepare("SELECT * FROM posts JOIN users ON users.id=posts.user_id");
    $stm->execute(array($_SESSION['id']));
    $post=$stm->fetchAll();
    foreach($post as $info):?>
        
            <div class="row">
                <div class="col-lg-8 col-md-10 col-11 border border-secondary mb-1 mx-auto rounded p-1 shadow">
                    <h4 class="pt-1"><img src="layout/img/<?php echo $info['img']?>" width="40" height="40" class=" rounded-circle mr-2"><?php echo $info['username'];?></h4>
                    <hr class="mt-0 bg-info mb-2">
                    <p class="bg-white form-control px-2 py-3"><?php echo $info['posts'];  ?></p>
                </div>
            </div>
    <?php endforeach; ?>
</div>


<?php
    include"inc/templets/foter.php";
?>