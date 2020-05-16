<!DOCTYPE html>
<html>
<head>
    <title>Assignment</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/bootstrap-social.css">

</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-home fa-lg"></span> Home</a></li>
                    <li class="nav-item"><a class="nav-link" id="publi" href="index.php"><span class="fa fa-info fa-lg"></span> Published</a></li>
                    <li class="nav-item"><a class="nav-link" id="dra"href="draft.php"><span class="fa fa-list fa-lg"></span> Draft</a></li>
                    <li class="nav-item"><a class="nav-link" href="#createblog"><span class="fa fa-address-card fa-lg"></span> Create</a></li>
                    <li class="nav-item"><a class="nav-link" href="javascript:{}" onclick="openinstructions()"><span class="fa fa-address-card fa-lg"></span><strong>Instructions</strong></a></li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search Blog" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0 active" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <form style="display:none" id="published" method="post">
            <input value="published" name="publish">
        </form>
        <form style="display:none" id="draft" method="post">
            <input value="published" name="draft">
        </form>
        <?php if (empty($blogs)) : ?>
            <div class="container">
                <h1 style="text-align: center; color:red; padding-top: 40px"> No blog to Show<h2>
            </div>
        <?php else : ?>
        <?php foreach($blogs as $blog) : ?>
            <div class="offset-md-2 col-12 col-sm-8 mt-4 " >
                <div class="card">
                    <div class="card-img">
                        <button class="btn btn-light btn-sm"><?php echo $blog->category?></button>
                    </div>
                    <div class="card-body" >
                        <h4 class="card-title"><?php echo $blog->name?></h4>
                        <p class="card-text" id="<?php echo $blog->id?>" style="display:none"><?php echo $blog->description?></p>
                        <p class="card-text">-<i><?php echo $blog->author?></i></p>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4 col-sm-2">
                                        <a onclick="openblog(<?php echo $blog->id?>)" id="read<?php echo $blog->id?>" class="card-link btn btn-sm btn-primary text-white">Read Blog</a>
                                        <a onclick="closeblog(<?php echo $blog->id?>)" id="hide<?php echo $blog->id?>"style="display:none" class="card-link btn-sm btn btn-primary text-white">Hide Blog</a>
                                    </div>
                                    <div class="col-4 col-sm-2">
                                        <a onclick="updateblog(<?php echo $blog->id?>)" class="card-link btn-sm btn btn-info ml-2 text-white">Update</a>
                                    </div>
                                    <div class="col-4 col-sm-2">
                                        <a onclick="confirmdelete(<?php echo $blog->id?>)" class="card-link btn-sm btn btn-warning">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                        <div class="views"><?php echo $blog->date?>, <?php echo $blog->time?></div>
                        <div class="stats">
                            <i class="far fa-eye"></i> <?php echo $blog->status?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="deletemodal<?php echo $blog->id?>" class="modal fade" role="dialog">
                <div class="modal-dialog modal-sm" role="content">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h4 class="modal-title text-white">Confirm Delete</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <a href="delete.php?id=<?php echo $blog->id?>" class="btn btn-warning"> Confirm Delete</a>
                            <a data-dismiss="modal" class="btn btn-info"> Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="modal<?php echo $blog->id?>" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg" role="content">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title text-white">Update Blog</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                    
                    <div class="modal-body">
                        <form method="POST" action="update.php" type="submit">
                            <input type="text" class="form-control" id="id" name="id" value="<?php echo $blog->id?>" style="display:none">
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label">Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $blog->name?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-2 col-form-label">Description</label>
                                <div class="col-md-10">
                                    <textarea type="text" id="description" name="description" cols="30" rows="3" class="form-control"><?php echo $blog->description?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-md-2 col-form-label">Category</label>
                                <div class="col-md-10">
                                    <select id="category<?php echo $blog->id?>" value="Food" name="category" class="form-control">
                                        <option value="Fashion">Fashion</option>
                                        <option value="Food">Food</option>
                                        <option value="Travel">Travel</option>
                                        <option value="Music">Music</option>
                                        <option value="Lifestyle">Lifestyle</option>
                                        <option value="Business">Business</option>
                                        <option value="Fitness">Fitness</option>
                                        <option value="DIY">DIY</option>
                                        <option value="Sports">Sports</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <script type="text/javascript">
                                    var categoryid = "category" + <?php echo $blog->id?>;
                                    document.getElementById(categoryid).value = "<?php echo $blog->category?>";
                                </script>
                            </div>
                            <div class="form-group row">
                                <label for="author" class="col-md-2 col-form-label">Author</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="author" name="author" value="<?php echo $blog->author?>">
                                </div>
                            </div>
                            <div class="form-group row" style="display: none">
                                <label for="status" class="col-md-2 col-form-label">Status</label>
                                <div class="col-md-10">
                                    <label class="radio-inline"><input type="radio" id="draft<?php echo $blog->id?>" value="Draft" name="status"> Draft</label>
                                    <label class="radio-inline"><input type="radio" id="published<?php echo $blog->id?>" value="Published" name="status"> Published</label>
                                </div>
                                <script type="text/javascript">
                                    var draftid = "draft" + <?php echo $blog->id?>;
                                    var publishedid = "published" + <?php echo $blog->id?>;
                                    if(!"<?php echo $blog->status?>".localeCompare("Draft")){
                                        document.getElementById(draftid).checked = true;
                                    }
                                    else{
                                        document.getElementById(publishedid).checked = true;
                                    }
                                </script>
                            </div>
                            <div class="form-group row">
                                <div class="offset-md-2 col-12">
                                    <button type="submit" class="btn btn-primary" id="submit" name="submit" >Update Blog</button>
                                    <?php if (strcmp($blog->status,"Draft") == 0) : ?>
                                        <button type="submit" class="btn btn-primary" id="submit" name="submit" onclick="changestatus(<?php echo $blog->id?>)" >Publish Blog</button>
                                    <?php endif; ?>	
                                    <button class="btn btn-secondary" data-dismiss="modal">Return</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div id="instructions" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="content">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h4 class="modal-title text-white">Please read carefully to better assess this assignment. Thank You!</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>This application essentialy has two sections Published blogs and Draft blogs.</li>
                        <li>This application doesn`t have any home page, "Home" button takes you to top of the current section.</li>
                        <li>Therefore, this website shows published blogs when first rendered by default.</li>
                        <li>I have uploaded some blogs, so that you can test different functions.</li>
                        <li>You can either publish or draft a blog after creating it.</li>
                        <li>Search Utility: You can search blogs with any keyword, results would be retrieved from entire database.</li>
                        <li>You can publish draft blogs by using "update" utility for a drafted blog.</li>
                        <li>I have tried to incorporate PHP as best as I can to illustrate my skills.</li>
                        <li>I have tried to adhere to MVC design pattern.</li>
                        <li>I would request you to spend some time here. Assignments like these take time!</li>
                        <li>Happy Blogging!</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Proceed</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4"id="createblog">
        <div class ="row">
            <div class ="offset-md-2 col-12 col-sm-8">
                <div class="card">
                    <h3 class="card-header bg-primary text-white">Create a Blog</h3>
                    <div class="card body">
                        <div class="container mt-2">
                            <form method="POST" action="add.php" type="submit" onsubmit="return verifyblog()" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="name" class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-md-2 col-form-label">Description</label>
                                    <div class="col-md-10">
                                        <textarea type="text" id="description" name="description" cols="30" rows="3" class="form-control" placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="category" class="col-md-2 col-form-label">Category</label>
                                    <div class="col-md-10">
                                        <select id="category" name="category" class="form-control">
                                            <option value="Fashion">Fashion</option>
                                            <option value="Food">Food</option>
                                            <option value="Travel">Travel</option>
                                            <option value="Music">Music</option>
                                            <option value="Lifestyle">Lifestyle</option>
                                            <option value="Lifestyle">Motivation</option>
                                            <option value="Business">Business</option>
                                            <option value="Fitness">Fitness</option>
                                            <option value="DIY">DIY</option>
                                            <option value="Sports">Sports</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="author" class="col-md-2 col-form-label">Author</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="author" name="author" placeholder="Author">
                                    </div>
                                </div>
                                <div class="form-group row" style="display: none">
                                    <label for="status" class="col-md-2 col-form-label">Status</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="statussubmit" name="status" placeholder="Status">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6 offset-md-2 col-md-2">
                                        <button type="submit" class="btn btn-primary" id="submit" name="submit" onclick="setpublish()">Publish Blog</button>
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <button type="submit" class="btn btn-secondary" id="submit" name="submit" onclick="setdraft()">Add to Draft</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script type="text/javascript">
    function openblog(id){
    document.getElementById(id).style.display='block';
    document.getElementById("read"+id).style.display='none';
    document.getElementById("hide"+id).style.display='inline';
}
function closeblog(id){
    document.getElementById(id).style.display='none';
    document.getElementById("hide"+id).style.display='none';
    document.getElementById("read"+id).style.display='inline';
}
function updateblog(id){
    var modalid = "#modal" + id;
    $(modalid).modal("toggle");
}
function confirmdelete(id){
    var modalid = "#deletemodal" + id;
    $(modalid).modal("toggle");
}
function setpublish(){
    document.getElementById('statussubmit').value = "Published";
}
function setdraft(){
    document.getElementById('statussubmit').value = "Draft";
}
function openinstructions(){
    $("#instructions").modal("toggle");
}
function select(id, category){
    var selectid = "#category" + id;
    $(selectid).val(category);
}
function changestatus(id){
    
    var draftid = "draft" + id;
    var publishedid = "published" + id;
    document.getElementById(draftid).checked = false;
    document.getElementById(publishedid).checked = true;
}
function defaultset(id, category){
    var selectid = "#category" + id;
    document.getElementById(selectid ).value = "Food"
}
</script>