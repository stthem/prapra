<?php
session_start();
#
$Path        = $_SERVER["SCRIPT_URL"];
$Arr         = explode("/",$Path);
$Main_Folder = 'SearchDekanat';
#$Main_Folder = $Arr[1];
#
require_once "../Header.php"; 
#
$Status    = 'User';
$username  = $_SERVER['REMOTE_USER'];
$_SESSION['username'] = $username;
$_SESSION['Status'  ] = $Status;
$FormType  ='3_students';
$KeyValue  = $username;
include "../FirstKey_Search.php";
$FIO       = $QueryResult[0]['Stud_FIO'];
$_SESSION['FIO']      = $FIO;
print '
       <p></p>
       <p></p>       
       <table bgcolor="#999999" border="0" height=8 width="860" cellpadding="1" cellspacing="1" align="center">
           <tr>
              <td align="left"  bgcolor="#FFFFFF">
      ';
print "
       <center> 
               <img src = '../../$Main_Folder/Pictures/lock_gre.gif'>&nbsp;
       </center>
      ";
print "
       <center> 
               <font color='Red' size='4'>
                     КАБИНЕТ СТУДЕНТА<br>
               </font>
               <font color='Maroon' size='4'>
                 Добро пожаловать <br> $FIO!<br>
               </font> 

       ";
?>
<br>
Кликнете на эту ссылку, чтобы начать работать с системой. <br>Желаем успехов!
<br>
<p>
<a href="../Forms_Main_Reg.php?FormType=3_students&operation=UPD&KeyValue=<?=$username?>">
<strong>
ОБНОВЛЕНИЕ МОИХ ПЕРСОНАЛЬНЫХ ДАННЫХ
</strong>
</a>
</p>
<br>
<a href="../View_Table.php?FormType=6_docs">
<strong>
ПРОСМОТР ТИПОВ ДОКУМЕНТОВ И ОФОРМЛЕНИЕ ЗАЯВКИ
</strong>
</a>
</p>
<br>
<p>
<a href="../FirstKey_Search.php?FormType=8_ocenky&KeyValue=<?=$username?>&Print=1">
<strong>
ПРОСМОТР МОИХ ОЦЕНОК
</strong>
</a>
</p>
<br>

</td>
 </tr>
</table>
<?php include '../Footer.php'; ?>