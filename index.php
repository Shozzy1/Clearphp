<?php
$get_mod = isset($_GET['mod']) ? $_GET['mod'] : true;
$id = explode("=", $get_mod);




switch ($get_mod) {
  case 'today':
    include("modules/today/index.php");
    exit();
  case 'seven':
   include("modules/seven/index.php");
    exit();
  case 'arhive':
    include("modules/arhive/index.php");
    exit();
  case 'reg':
    include("modules/reg/reg.php");
    exit();
  case 'auth':
    include("modules/authorize/auth.php");
    exit();
  case 'update_project?id='.$id[1].'':
    include("modules/projects/update.php");
    exit();
  case 'delete_project?id='.$id[1].'':
    include("modules/projects/delete.php");
    exit();
  case 'update_task?id='.$id[1].'':
    include("modules/tasks/update.php");
    exit();
  case 'delete_task?id='.$id[1].'':
    include("modules/tasks/delete.php");
    exit();
  case 'complete_task?id='.$id[1].'':
    include("modules/tasks/complete.php");
    exit();
  case 'sort_project?id='.$id[1].'':
    include("modules/sort/index.php");
    exit();      

}


include($_SERVER['DOCUMENT_ROOT'].'clearphp\modules\today');
?>
