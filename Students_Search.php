<?php 
####################################################################################
# Модуль производит расширенный поиск по полям - Stud_FIO, Id_Fak, Year            #
# можно унифицировать программу для любых таблиц)                                  #
# При клике на ссылке "расширенный поиск" Form_Buttons.php вызывается обработчик   #
# Entry_Search.php с меню расширенного поиска Form_Buttons_Clients.php             #
#                                                                                  #
####################################################################################
#
$Arr_w                  = array();
$Row_w                  = array();
$dbtable                ='8_ocenky';
$FormType               ='8_ocenky';
#
# Заголовки всех таблиц БД проекта, на английском формируются динамически
require_once 'DB_Tables_Fields.php';
#
# Класс для построения таблиц по заголовкам и содержанию таблиц
require_once 'Any_Table_HTML_New.php';

# Класс для работы с базой данных MySQL, описание в теле модуля   
require_once 'DB_Class.php';             
# 
# Заголовки всех таблиц веб проекта, которые появляются на экране 
require_once 'Table_Headers.php';
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

#******************************* Поиск по ключам ********************************
# то только записи соответствующие ввденным ключам будут найдены и выданы на экран 
#
if     (!($_POST["Stud_FIO"])) 
       $KeyValue1    = '%';
else   
       {
       	$KeyValue1    = trim($_POST["Stud_FIO"]);  // может быть пустым
       	$KeyValue1    = '%'.$KeyValue1.'%'; 
       }
#
if     (!($_POST["Predmet"]))  
       $KeyValue2    = '%';
else   
       {
       	$KeyValue2    = trim($_POST["Predmet"]);  // может быть пустым
       	$KeyValue2    = '%'.$KeyValue2.'%'; 
       }
#
if     (!($_POST["Stud_Group"]))  
       $KeyValue3    = '%';
else   
       {
       	$KeyValue3    = trim($_POST["Stud_Group"]);  // может быть пустым
       	$KeyValue3    = '%'.$KeyValue3.'%'; 
       }
#
#
if     (!($_POST["Semestr"]))  
       $KeyValue4    = '%';
else   
       {
       	$KeyValue4    = trim($_POST["Semestr"]);  // может быть пустым
       	$KeyValue4    = '%'.$KeyValue4.'%'; 
       }
# 
if (($KeyValue1=="%")&&($KeyValue2=="%")&&($KeyValue3=="%")&&($KeyValue4=="%"))
   {
	$msg1='Ошибка! Введите данные для поиска.'; 
	include 'Entry_Search.php';
	exit;
   }
# поиск по нескольким ключам
else
   { 
   	 $KeyName0  =  $headers_db[0]; 
   	 $KeyName1  =  $headers_db[1]; 
   	 $KeyName2  =  $headers_db[4]; 
   	 $KeyName3  =  $headers_db[2]; 
   	 $KeyName4  =  $headers_db[3]; 
/*
print "<br>KeyName0=$KeyName0";print "<br>KeyValue0=$KeyValue0";
print "<br>KeyName1=$KeyName1";print "<br>KeyValue1=$KeyValue1";
print "<br>KeyName2=$KeyName2";print "<br>KeyValue2=$KeyValue2";
print "<br>KeyName3=$KeyName3";print "<br>KeyValue3=$KeyValue3";
print "<br>KeyName4=$KeyName4";print "<br>KeyValue4=$KeyValue4";
print "<br>SELECT * FROM  $dbtable 
	                                      WHERE $KeyName1 LIKE '$KeyValue1'
	                                      AND   $KeyName2 LIKE '$KeyValue2'
                                          AND   $KeyName3 LIKE '$KeyValue3'
                                          AND   $KeyName4 LIKE '$KeyValue4'
 	                                      ORDER BY $KeyName0";
*/
	 $$FormType = $dbObj->query("SELECT * FROM  $dbtable 
	                                      WHERE $KeyName1 LIKE '$KeyValue1'
	                                      AND   $KeyName2 LIKE '$KeyValue2'
                                          AND   $KeyName3 LIKE '$KeyValue3'
                                          AND   $KeyName4 LIKE '$KeyValue4'
 	                                      ORDER BY $KeyName0");	                                      

   }
# возвращает массив ассоциативных массивов (см. класс DB_Class.php)   
# по сути двумерный массив, поэтому используем конструкцию foreach
# это можно увидеть убрав знак # перед print см. ниже. Таким образом
# формируются массивы для вывода на экран, даже если таблица состоит
# из одной строки (как в случае поиска)
#
if ($$FormType==false)
   {
	$msg1  ='Запись не найдена в таблице'; print $msg1;
	include_once 'Entry_Search.php';
	exit;
   }
else              
   {       
    $NC  = count($$FormType);
    //print '$NC='.$NC;
    //print '<pre>'; print_r($$FormType); print '</pre>'; 
   } 
$head_color   = 'silver';
$Table_view   =  new HTML_Table($headers , $head_color);         
foreach ($$FormType as $row    => $Arr_w)
    	{
    	 $i=0;	
    	 foreach ($headers_db as $element) 
    	         {
    	 	      $Row_w = array_merge($Row_w, array($headers[$i] => $Arr_w[$headers_db[$i]]) );
    	 	      $$headers_db[$i] = $Arr_w[$headers_db[$i]];
    	 	      $i++;
    	 	     }	
    	 $Table_view ->  AddRowAssArr($Row_w);
        }
#                     
include'Header.php';                // общий заголовок для всех страниц проекта 
print "<p><font color='red'><strong>НАЙДЕННЫЕ СТУДЕНТЫ</strong>&nbsp$msg1&nbsp</font></p>";
$Table_view -> PrintArr();          // таблица 'Staff' - все назначения на текущий момент
include 'Form_Buttons_Students.php';
//print '<p><a href="All_Tables_short.php">Просмотр структуры всех таблиц</a>';
//print "&nbsp<a href='Forms_Main.php?formtype=$FormType'>
//       Добавить новую запись в таблицу</a><p>";
include 'Footer.php';               // стандартная нижняя строка каждой страницы
#
 
?>