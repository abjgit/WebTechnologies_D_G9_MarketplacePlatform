<?php
    session_start(); 
    include_once('../model/requestService.php');
    include_once('../model/postService.php');
    include_once('../model/freelancerService.php');
    if(isset($_SESSION['log']))
    {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>riverr | Home</title>
    <link rel="stylesheet" type="text/css" href="../asset/style/header.css?v=<?php echo time()?>">
    <link rel="stylesheet" type="text/css" href="../asset/style/footer.css?v=<?php echo time()?>">
    <link rel="stylesheet" type="text/css" href="../asset/style/main.css?v=<?php echo time()?>">
    <link rel="stylesheet" type="text/css" href="../asset/style/home.css?v=<?php echo time()?>">
    <link rel="stylesheet" type="text/css" href="../asset/style/post.css?v=<?php echo time()?>">
    <style>
        .projectName{
            color: rgb(127, 3, 252);
        }
        .reqss{
            border: rgba(18, 236, 91, 0.856) .1rem solid;
            margin: .5rem;
        }
    </style>
</head>
<body>
    <div class="main_container"> 
        <div>
            <?php include_once('header.php')?>
        </div>
        <div class="main-body">
            <div class="left-sidebar">
                <div class="left-menu">
                    <a class="menu-button" href="http://localhost/php/webTechnologies_D_G9_MarketplacePlatform/view/profile.php?user_id=<?=$_SESSION['id']?>" class="header-right-menus">Profile</a>
                    <a class="menu-button" href='post.php'>Post</a>
                </div>
            </div>
            <div class="newsfeed">
                <?php
                    if($_SESSION['type']=='Buyer')
                    {
                        $reqs=requestByBuyerID($_SESSION['id']);
                        if(count($reqs)>0) 
                        {
                            for($i=count($reqs)-1;$i>=0;$i--)
                            {
                                $posts=postInfo($reqs[$i]['pid']);
                                $free=freelancerInfo($reqs[$i]['fid']);
                ?>
                <div class="notify">
                    <div class="reqss">
                        <?php 
                            if($reqs[$i]['status']=='')
                            {
                        ?>
                            <a class="link" href="http://localhost/php/webTechnologies_D_G9_MarketplacePlatform/view/profile.php?user_id=<?=$free['id']?>"><?=$free['name']?></a> <span>sent you a project propsal for<span class="projectName"> <?=$posts['pname']?></span></span>
                            <a class="link" href="http://localhost/php/webTechnologies_D_G9_MarketplacePlatform/view/viewreq.php?req=<?=$reqs[$i]['rid']?>">view req</a>
                        <?php 
                            }
                            else if($reqs[$i]['status']=='Reject')
                            {
                        ?>
                        <a class="link" href="http://localhost/php/webTechnologies_D_G9_MarketplacePlatform/view/profile.php?user_id=<?=$free['id']?>"><?=$free['name']?></a> <span>sent you a project propsal for<span class="projectName"> <?=$posts['pname']?></span> was rejected by you</span>
                        <?php 
                            }
                            else if($reqs[$i]['status']=='Accept')
                            {
                        ?>
                        <a class="link" href="http://localhost/php/webTechnologies_D_G9_MarketplacePlatform/view/profile.php?user_id=<?=$free['id']?>"><?=$free['name']?></a> <span>sent you a project propsal for<span class="projectName"> <?=$posts['pname']?></span> was accepted by you</span>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <?php 
                            }
                        }
                    }

                 ?>
            </div>
            <div class="right-sidebar">
                <div class="recent">
                    <div class="hd">Most recents</div>
                    <div class="desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio omnis saepe corporis vero quas? Accusamus a dolorem animi omnis beatae.</div>
                    <div class="desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio omnis saepe corporis vero quas? Accusamus a dolorem animi omnis beatae.</div>
                </div>
                <div class="adv">
                    <div class="hd2">Advertisements</div>
                    <div class="hd">Wanna be a freelancer?</div>
                    <div class="desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam ducimus maxime, aperiam saepe doloremque magnam natus ad temporibus voluptates incidunt, velit perferendis accusamus animi. Pariatur ratione voluptatem cupiditate repellat illum!</div>
                    <div class="hd">Looking for experienced SEO?</div>
                    <div class="desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam ducimus maxime, aperiam saepe doloremque magnam natus ad temporibus voluptates incidunt, velit perferendis accusamus animi. Pariatur ratione voluptatem cupiditate repellat illum!</div>
                </div>
            </div>
        </div>
        <div>
            <?php include_once('footer.php')?>
        </div>
    </div>
    <script src="../asset/script/requestmanage.js"></script>
</body>
</html>
<?php
    }
    else
    {
        header('location: ../index.php');
    }
?>