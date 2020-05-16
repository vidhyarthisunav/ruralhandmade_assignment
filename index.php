<?php
    
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=blogs', 'sunav', 'harry');
        // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    $all_blogs = $pdo->query("SELECT * FROM blogs WHERE status='published'");

    while ( $row = $all_blogs->fetch(PDO::FETCH_OBJ) ) 
    {
        $blogs[] = $row;
    }
    
    if(!empty( $blogs)){
        $blogs = array_reverse($blogs, true);
    }
    include 'main.php';
    
?>
<script src="scripts/jquery/dist/jquery.slim.min.js"></script>
<script type="text/javascript">
    $("#publi").addClass("active");
</script>
