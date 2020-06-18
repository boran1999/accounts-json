<?php
  include "formclass.php";
  $base = new formclass;
 ?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <h1 align ="center"><font color="darkblue">Абоненты</font></h1>
  <title>Accs</title>
  <style>
    table.til{
    margin: 0 auto;
  }
  .til td{
    width: 5%;
    text-align:center;
    border: 1px solid;
  }
  a{color: black; text-decoration: none;}
  a:hover{color: navy; text-decoration: underline;}
  </style>
 </head>
 <body background="back.png">
    <button><a href="/calendar">Все абоненты</a></button>
    <button><a href="/calendar?bal=yes">Баланс больше 0</a></button> 
    <button><a href="/calendar?bal=no">Баланс меньше 0</a></button> 
  <table class="til td" border = 1 align="center" width=100%> <tr> 
    <th width=2px><font face="CALIBRI">Номер телефона</font></th> 
    <th><font face="CALIBRI">Номер счёта</font></th> 
    <th><font face="CALIBRI">Баланс</font></th> 
    <th><font face="CALIBRI">Редактировать</font></th> 
    <th><font face="CALIBRI">Удалить</font></th> 
  </tr>
  <?php
    if(!empty($_GET)){
      if(isset($_GET['del'])){
        $base->del_table($_GET['id']);
      }
      if($_GET['bal']=='yes'){
        $base->balancef(1);
      }
      if($_GET['bal']=='no'){
        $base->balancef(0);
      }
    }
    if(empty($_GET)){
      $base->ins_table();
    }
  ?>
</table>
  <form action="form.php" method="POST">
   <p align="center"><input type="submit" value="Добавить задачу"></p>
  </form>
<div>
</div>
</body>
</html>
