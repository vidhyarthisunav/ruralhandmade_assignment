<?php
    
    include 'pdo_helper.php';
    $pdo = pdoHelper();
      
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
<script type="text/javascript">
    $("#publi").addClass("active");
</script>
