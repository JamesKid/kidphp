<html>  
    <head>  
        <title>aa<?php echo $params['title'] ?></title>  
    </head>  
    <body>  
    <h1><?php  echo $params['content'] ?></h1>  
     
    <?php  if( ! empty($params['arr'])) { ?>  
        <ul>  
            <?php foreach($params['arr'] as $value) { ?>  
            <li><?php echo $value ?></li>  
            <?php } ?>  
        </ul>  
    <?php } ?>  
     
    </body>  
</html>  
