<?php
     require_once 'include/database.php';

?>





<html>
<head>
<title>ИС УСПЕВАИМОСТИ ДЕКАНАТА
</title>
<style>
   a { 
    text-decoration: none; /* Отменяем подчеркивание у ссылки      */
   }
    A IMG {
    border: none;          /* Убираем рамку в изображениях-ссілках */
   }
     .required
     {
      color: red;
     }
   #form_single {
    width: 15px; /* Ширина поля в пикселах */
   }  
</style>  
</head>
<body>
<?php 
header("Content-Type: text/html; charset=utf-8"); 
include_once 'Main_Site_Settings.php';
?>
<table bgcolor="#FFFFFF" border="0" width="99%" cellpadding="0" cellspacing="0">
<tr>
<td colspan="2" align="center" valign="top" width="100%">
     <img src="Pictures/Logotip1.png">
</td>
<td colspan="4" align="center" bgcolor="LightBlue" width="100%">
     <font  color="Maroon" size="5">
        <strong>
        ::  &nbsp;&nbsp;ИНФОРМАЦИОННАЯ СИСТЕМА УЧЕТА И ПОИСКА&nbsp;&nbsp;  :: <br> :: УСПЕВАЕМОСТИ СТУДЕНТОВ::  
        </strong></font>
</td>
<td colspan="2" align="center" valign="top">
     <img src="Pictures/Logotip2.png">
</td>
</tr>
<tr><td width="10%" align="center" bgcolor="#FFCCCC">
      <a href="index.php"><font  color="Maroon" size="3"><strong>О ПРОЕКТЕ</strong></font></a>
    </td>
      
	<td  width="11%" align="center" bgcolor="#FFCCCC">
	  <a href="View_Table.php?FormType=5_staff" ><font  color="Maroon" size="3"> <strong>ПЕРСОНАЛ</strong></font></a>	 
    </td>
 
     <td  width="11%" align="center" bgcolor="#FFCCCC">
	  <a href="View_Table.php?FormType=3_students" ><font  color="Maroon" size="3"><strong>СТУДЕНТЫ</strong></font></a>	 
     </td>

    <td width="19%" align="center" bgcolor="#FFCCCC">
	  <a href="View_Table.php?FormType=2_kafedry" ><font  color="Maroon" size="3"> <strong>КАФЕДРЫ</strong></font></a>
    </td>
	
	 <td  width="19%" align="center" bgcolor="#FFCCCC">
	  <a href="View_Table.php?FormType=1_fakultet"><font color="Maroon" size="3"> <strong>ФАКУЛЬТЕТЫ</strong></font></a>	 
     </td>
	
     <td  width="20%" align="center" bgcolor="#FFCCCC">
	  <a href="View_Table.php?FormType=4_groups"><font  color="Maroon" size="3"> <strong>ГРУППЫ</strong></font></a>
     </td>

    <td  width="11%" align="center" bgcolor="#FFCCCC">
	  <a href="View_Table.php?FormType=6_docs"><font  color="#FFCCCC" size="3"> <strong>ДОКУМЕНТЫ</strong></font></a>
    </td>

     <td  width="11%" align="center" bgcolor="#FFCCCC">
          
	  <a href="Entry_System_Member.php">         <font  color="Maroon" size="1"><strong>ВХОД       </strong></font></a> 
                                                                             <font  color="Maroon" size="2"><strong>|          </strong>
          <a href="Reg_Frame.php?FormType=3_students"><font  color="Maroon" size="1"><strong>РЕГИСТРАЦИЯ</strong></font></a>
        	 
     </td>

</tr>
</table>
<table bgcolor="#999999" height=10 width="99%" cellspacing="1" cellpadding="1" border="0">
<tr>
<td align="left" valign="top" bgcolor="Olive">
</td>
</tr> 
</table>
