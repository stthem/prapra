<?php
include      'Header.php';
print "
<p></p>
<table bgcolor='#999999' border='0' height='8' width='1240' cellpadding='1' cellspacing='1' align='center'>
  <tr>
  <td align='center'  bgcolor='#FFFFFF'>
";
#
/*
if (!$msq)
     print "<br><strong>Добро пожаловать ".$username.'!</strong>';
else print "<br><strong>$msq</strong>";
*/
//print "<br><strong>Hello ".$name.'<br>You have been successfully authorized!</strong>';
//print "<br><strong>Hello ".$server_remote_user.'<br>You have been successfully authorized!</strong>';
print "<br><img src = '../../SearchDekanat/Pictures/lock_gre.gif'>&nbsp;";
include 'Form_Buttons_Students.php'; 
print   '<font color="Silver"> ( Примеры: 1. Фамилия, "Больн"
                                          2. Предмет, "мат"
										  3. Группа, 011
										  4. Семестр, 1
                                       )           
         </font>';
/*
print   "<br><img src = '../../SearchDekanat/Pictures/lock_gre.gif'><br>";
include 'Form_Buttons_Equip.php'; 
print   '<font color="Silver"> ( Пример: 1. Шок - все товары сл словом шоколад &nbsp;

                                       )
         </font>';
print   "<br><img src = '../../SearchDekanat/Pictures/lock_gre.gif'><br>";
include 'Form_Buttons_AllDB.php'; 
print   '<font color="Silver"> ( Примеры: 1. Урбан  - поиск по вхождению хотя бы части слова

                                       )
         </font>';
*/      
print   "
</td>
</tr>
</table>";
include 'Footer.php';
?>