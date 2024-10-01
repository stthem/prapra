<?php
session_start();
#
$Path        = $_SERVER["SCRIPT_URL"];
$Arr         = explode("/",$Path);
$Main_Folder = 'SearchDekanat';
#$Main_Folder = $Arr[1];
#
require_once "../Header.php"; 
$Status    = 'Admin';
$_SESSION['Status'  ] =$Status;
$Status='gecnj';
$Status=$_SESSION['Status'];
//print '<br>ПЕРЕД FirstKey_Search $Status='.$Status;
$username  = $_SERVER['REMOTE_USER'];
$_SESSION['username'] =$username;
$username  = $_SESSION['username'];
//print '<br>ПЕРЕД FirstKey_Search $username='.$username;
$FormType  ='3_students';              //Пользователи с админом
$KeyValue  = $username;
include "../FirstKey_Search.php";
$FIO       = $QueryResult[0]['Stud_FIO'];
//print '<br>ПОСЛЕ FirstKey_Search $Status='.$Status;
//print '<br>ПОСЛЕ FirstKey_Search $username='.$username;
$Status=$_SESSION['Status'];
$username=$_SESSION['username'];
//print '<br>ПОСЛЕ FirstKey_Search $username='.$username;
print '
       <p></p>
       <p></p>       
       <table bgcolor="#999999" border="0" height=8 width="860" cellpadding="1" cellspacing="1" align="center">
           <tr>
              <td align="left"  bgcolor="#FFFFFF">
      ';
print "
       <center> 
               <img src = '../Pictures/NalZachita.png'>&nbsp;
       </center>
      ";
print "
       <center> 
               <font color='Red' size='4'>
                     <strong>КАБИНЕТ АДМИНИСТРАТОРА</strong><br>
               </font>
               <font color='Maroon' size='4'>
                 Добро пожаловать <br> $FIO!<br>
               </font> 

       ";
?>
<br>
<!--Кликнете на эту ссылку, чтобы начать работать с системой. <br>Желаем успехов!//-->
<img src = '../Pictures/ClientsSmall.jpg'>
<br>
<a href="../View_Table.php?FormType=5_staff">
<strong>
ПРЕПОДАВАТЕЛИ
</strong>
</a>
</p>
<p>
<img src = '../Pictures/MyClientsSmall.jpg'>
<br>
<a href="../View_Table.php?FormType=3_students">
<strong>
СТУДЕНТЫ
</strong>
</a>
</p>
<p>
<img src = '../Pictures/OneClientSmall.jpg'>
<br>
<a href="../View_Table.php?FormType=4_groups">
<strong>
ГРУППЫ
</strong>
</a>
</p>
<p>
<img src = '../Pictures/search.png'>
<br>
<a href="../Entry_Search.php">
<strong>
ПОИСК ОТЧЕТЫ
</strong>
</a>
</p>

</td>
 </tr>
</table>