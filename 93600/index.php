<?php
  include "api.php";
  $base = new api;
  if(!empty($_GET)){
  	if(isset($_GET['bal'])){
	      if($_GET['bal']=='yes'){
	        $base->balancejf(1);
	      }
	      if($_GET['bal']=='no'){
	        $base->balancejf(0);
	      }
  		}
    if(isset($_GET['id']) && !isset($_GET['del']) && !isset($_GET['change'])){
      	$base->getjs_by_id($_GET['id']);
      }
    if(isset($_GET['num']) && isset($_GET['acc']) && isset($_GET['bal']) && !isset($_GET['change'])){
      	$base->jssave($_GET['num'], $_GET['acc'], $_GET['bal']);
      }
    if(isset($_GET['num']) && isset($_GET['acc']) && isset($_GET['bal']) && isset($_GET['change']) && isset($_GET['id'])){
    	if($_GET['change']=='yes'){
      		$base->jsupd($_GET['id'],$_GET['num'], $_GET['acc'], $_GET['bal']);
      }
  }
    if(isset($_GET['del']) && isset($_GET['id'])){
      	if($_GET['del']=='yes'){
      		$base->deljs_by_id($_GET['id']);
      	}
      }
    }
    if(empty($_GET)){
       $base->alljson();
    }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>json</title>
</head>
<body>

</body>
</html>