<?php require_once('includes/initialize.php'); ?>
<pre>
<?php
    if($_POST) {
            echo "Primljeni podaci: <hr/>";
            foreach($_POST as $k=>$v) {
                    echo $k . "=". $v . "<br/>";
            }
    } else {
            echo "Podaci moraju biti poslani HTTP POST metodom";
    }

    echo '<hr/>';
    $data = json_decode(stripslashes($_POST['data']));
    print_r($data);
    
/*JSON
  $data = json_decode(stripslashes($_POST['data']));
  foreach($data as $d){
     echo $d;
  }
*/  
  
  
?>
</pre>