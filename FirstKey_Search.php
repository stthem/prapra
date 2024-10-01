<?php 
####################################################################################
# Модуль производит поиск по полю - Id                                             #
# Может выдавать результат на экран, если Print=1                                  #
# Если одна запись, то заволняется массив $Values                                  #
####################################################################################
#
session_start();
##############################################
$username       =  $_SESSION['username'];
$Status         =  $_SESSION['Status'  ];
$FIO            =  $_SESSION['FIO'     ];
##############################################
//$Status=$_SESSION['Status'];
//print '<br>FirstKey_Search $Status='.$Status;
//print '<br>FirstKey_Search $username='.$username;
#
if ($_GET['FormType'])
         $FormType=$_GET['FormType']; 
# 
if ($_GET['KeyValue'])
         $KeyValue=$_GET['KeyValue']; 
if ($_GET['Print'])
         $Print=$_GET['Print']; 	       //Если 1, то результат выдается на экран 
# 
$print_firstkey         = 0;  
$Arr_w                  = array();
$Row_w                  = array();
$dbtable                = $FormType;
$Row                    = array();                          // Рабочий массив
#
# в ранних версиях был файл require_once 'Table_Headers_DB.php';
# Заголовки всех таблиц БД проекта, на английском формируются динамически
require_once 'DB_Tables_Fields.php';
#                 
# Класс для построения таблиц по заголовкам и содержанию таблиц
require_once 'Any_Table_HTML_New.php';

# Класс для работы с базой данных MySQL, описание в теле модуля   
require_once 'DB_Class.php';             
# 
# Заголовки всех таблиц веб проекта, которые появляются на экране 
include_once 'Table_Headers.php';
#
# Так мы делаем софт более независимым от конкретных таблиц БД
#
$headers    = $Table_Headers   [$FormType];// наименования столбцов таблицe 
$headers_db = $Table_Headers_DB[$FormType];// наименования доменов в таблице 
#                                          // БД и <input name's в формах
# Создаем объекты класса для вывода таблиц, вызываем конструктор
#$handler     = $FormType.'_Handler';      // обработчик настоящей формы

#
# Объект класса работы с базой данных создается внутри модуля DB_Class.php
//$dbObj                 =  new MySQL_db(DB_HOST, DB_USER, DB_PWD, DB_NAME); 
#
#include 'Client_form_valid.php  // проверяет введенные данные

#******************************* Поиск ключу ********************************
$KeyName         = $headers_db[0];
$QueryResult     = $dbObj->query("SELECT * FROM $dbtable WHERE $KeyName ='$KeyValue' ORDER BY '$KeyName' ");
if ($QueryResult==false)
   {
	include_once 'Header.php';   
    $msg1        ='Запись не найдена в таблице';
	print $msg1; 
	$FormType='3_students';
	print "<a href='Forms_Main.php?FormType=$FormType&operation=ADD'>Добавить новую запись</a>&nbsp;";
	exit;
//  $QueryResult = $dbObj->query("SELECT * FROM $FormType ORDER BY '$KeyName' ");
   }
else 
   {
    if ($print_firstkey==1){
    print '<br>Запись найдена в базе данных';
    print '<pre>'; 
    print_r($QueryResult); 
    print '</pre>'; 
    } 
   }
$i=0;   
foreach ($headers_db as $element) 
    	{
    	 $$headers_db = $QueryResult[0][$element];
		 $Values[]    = $$headers_db;	
    	 $i++;
    	}
$_SESSION['Val'] = $Values;	                // параметры можно сохранять так
if ($print_firstkey==1){		
    print '<pre>'; 
    print_r($Values); 
    print '</pre>'; 
}	
print $msg1;
if ($Print==1){
###
# Создаем объекты класса для вывода таблиц, вызываем конструктор
#
$Table_view =  new HTML_Table($headers, $heard_color); 
foreach ($QueryResult as $row => $Arr_acc)
    	{
    	 $i=0;	
    	 foreach ($headers_db as $element) 
    	         {
    	 	      $Row = array_merge($Row, array($headers[$i] => $Arr_acc[$headers_db[$i]]) );
    	 	      $i++;
    	 	     }	
    	 $Table_view   ->  AddRowAssArr($Row);
        } 
include 'Header.php';                        // заголовок для страниц проекта 
include 'FormMsgs.php';                      // заголовок для страниц проекта 
print "<p></p><font size= \"4\" color= \"blue\" ><strong>$All_Tables_Names_Acc[$FormType]</strong></font>";	
$Table_view      ->  PrintArr();
if ($Status=='Admin'){ 
// это временно, пока не добавили id записи оценки
if ($FormType!='8_ocenky')
include 'Form_Buttons.php';  
print "<a href='Admin/index_admin.php'>Вернуться в кабинет</a>&nbsp;&nbsp;&nbsp;&nbsp;";      
if ($FormType!='3_students'){    // Добавить студента только через регистрацию
print "<a href='Forms_Main.php?FormType=$FormType&operation=ADD'>Добавить новую запись</a>&nbsp;";
}
}
}		
?>