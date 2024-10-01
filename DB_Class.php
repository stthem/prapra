<?php 
class MySQL_DB
{
    private $dbObj = null;
    private $result = null;  

    public function __construct($host = 'MySQL-5.7', $user = 'root', $password = '', $base = 'searchdekanat', $port = null, $charset = 'utf8')
    {
        $this->dbObj = new mysqli($host = 'MySQL-5.7', $user = 'root', $password = '', $base = 'searchdekanat', $port);

        // Проверка соединения
        if ($this->dbObj->connect_error) {
            die("Connection failed: " . $this->dbObj->connect_error);
        }

        // Установка кодировки
        $this->dbObj->set_charset($charset);
    } 

    public function query($query)
    {
        if (!$this->dbObj) {
            return false; 
        }

        if (is_object($this->result)) {
            $this->result->free(); 
        }

        $this->result = $this->dbObj->query($query); 

        if ($this->dbObj->errno) {
            return $this->dbObj->error; 
        }

        if (is_object($this->result)) {
            while ($row = $this->result->fetch_assoc()) {
                $data[] = $row;
            }
            return isset($data) ? $data : []; // Возвращаем пустой массив, если данных нет
        } else if ($this->result === false) {
            return false;
        } else {
            return $this->dbObj->affected_rows;
        }
    }
}

// Подключение к базе данных
include 'DB_data.php';
$dbObj = new MySQL_DB(DB_HOST, DB_USER, DB_PWD, DB_NAME);
include 'DB_Coding.php';
?>

