<?php
    session_start(); 
    include_once('../model/postService.php');
    include_once('../model/buyerService.php');

    $posts=postAll();
    if($_SESSION['log'])
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>riverr | Post</title>
    <link rel="stylesheet" type="text/css" href="../asset/style/header.css?v=<?php echo time()?>">
    <link rel="stylesheet" type="text/css" href="../asset/style/footer.css?v=<?php echo time()?>">
    <link rel="stylesheet" type="text/css" href="../asset/style/main.css?v=<?php echo time()?>">
    <link rel="stylesheet" type="text/css" href="../asset/style/home.css?v=<?php echo time()?>">
    <link rel="stylesheet" type="text/css" href="../asset/style/post.css?v=<?php echo time()?>">
</head>
<body>
    <div class="main_container"> 
        <div>
            <?php include_once('header.php')?>
        </div>
        <div class="main-body">
            <div class="left-sidebar">
                <div class="left-menu">
                    <a class="menu-button" href="profile.php?user_id=<?=$_SESSION['id']?>">Profile</a>
                    <a class="menu-button" href='home.php'>Home</a>
                </div>
            </div>
            <div class="newsfeed">
                <?php 
                ///jei typer age sei div er por prjonto
                    if($_SESSION['type']=='Buyer')
                    {
                ?>
                <div class="post_input">
                    <div class="post_input_text">Name</div>
                    <input type="text" name="post_name" id="pname" class="pfield"><br>
                    <div class="post_input_text">Short Description</div>
                    <textarea id="description" name="description" class="desc" rows="4" cols="95">Write short description about your project</textarea><br>
                    <span class="post_input_text">Pricing $ </span><input type="text" class="pfield" name="price" id="price"><br>
                    <button class="btnY" onclick="post()">Post</button>
                    <div id="messagex"></div>
                </div>
                <?php } ?>
                <div class="posts">
                    <div class="post">
                        <?php
                        for($i=0;$i<count($posts);$i++)
                        {
                            $buyer=buyerInfo($posts[$i]['uid']);

                        ?>
                        <div class="info">
                        
                            <a class="link" href="http://localhost/php/webTechnologies_D_G9_MarketplacePlatform/view/profile.php?user_id=<?=$posts[$i]['uid'] ?>"><?=$buyer['name']?></a><br>
                            <div class="projectName">Project Name: <?=$posts[$i]['pname']?></div>
                            <div class="projectPrice">Price $: <?=$posts[$i]['price']?></div>
                            <a class="btnxy" href="http://localhost/php/webTechnologies_D_G9_MarketplacePlatform/view/aboutProject.php?pid=<?=$posts[$i]['pid']?>">view</a><br>
                        
                        </div>
                        <?php } ?>
                    </div>
                </div>
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
    <script src="../asset/script/post.js"></script>
</body>
</html>
<?php
    }
    else
    {
        header('location: ../index.php');
    }
?>