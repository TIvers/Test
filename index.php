<html>
<head>
<title> Главная страница </title>
<style>
button { 
    background-color: #525252; 
    border: none; color: white;
    padding: 15px 32px; text-align: center;
    text-decoration: none; display: inline-block;
    font-size: 16px; margin: 4px 2px; cursor: pointer; }
        
h2 {
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    border-radius: 10px;
    max-width: 100%;
    text-align: center;
    font-size: 36px;
    margin: 40px 0 20px
  }
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to bottom right, #ccc, #fff);
    font-size: 16px;
    text-align: center;
    line-height: 1.5;
    color: #333;
}
</style>





<?php 
class Date_changer { 
    public $today; //введение today
    public $weekday; //введение weekday
    public $month; //введение today
    public function __construct() { //обработка с помощью _construct
        $this->today = date('d-m-Y'); 
        $this->weekday = $this->getWeek(); 
        $this->month = $this->getMonth(); 
} 
    public function getWeek() { //метод для поиска дня недели
        $days = array('Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'); 
        $dayIndex = date('w', strtotime($this->today)-1);
        return $days[$dayIndex]; 
    } 
    public function getMonth() { //метод для поиска месяца
        $months = array( 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь' ); 
        $monthIndex = date('n', strtotime($this->today))-1; 
        return $months[$monthIndex]; 
    } 
    public function subtraction($date1, $date2) { //вычитание дат
        $subtraction = abs(strtotime($date2) - strtotime($date1));
        $subtraction_new = $this->convert($subtraction); 
        return $subtraction_new; 
    } 
    public function converterSeconds($sec) {// конвертер секунд
      $secArray = $this->convert($sec);
      return $secArray;
    }
    private function convert($num) { //private метод 
        $years = floor($num / (365 * 60 * 60 * 24)); 
        $months = floor(($num - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24)); 
        $days = floor(($num - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24)); 
        $hours = floor(($num - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60)); 
        $minutes = floor(($num - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60); 
        $seconds = floor($num - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minutes * 60); 
        return array( 'years' => $years, 'months' => $months, 'days' => $days, 'hours' => $hours, 'minutes' => $minutes, 'seconds' => $seconds ); 
    }
   public function formatDate($date) { //перевод из произвольного формата в заданный
    return date('Y-m-d', strtotime($date));
    
    } } 
   
 
     


    

    echo "<h2> Изменение дат</h2>";
$date1 = $_POST['date_one'];
$date2 = $_POST['date_two'];
$sec = $_POST['sec'];
$dc = new Date_changer();
$new_date1 = $dc->formatDate($date1);
$new_date2 = $dc->formatDate($date2);
$subtraction = $dc->subtraction($date1, $date2);
$converterSeconds = $dc->converterSeconds($sec);
     echo "<br>" ;
     echo "Разница между <b> $new_date1 </b> и <b>$new_date2 </b>: <b>". $subtraction['years'] . " лет " . $subtraction['months'] . " месяцев " . $subtraction['days'] . " дней </b>" ;
     echo "<br>" ;
     echo "Сегодняшний день: <b>" . $dc->today . "\n </b>"; 
     echo "<br>" ;
     echo "Текущий день недели: <b>" . $dc->weekday . "\n</b>"; 
     echo "<br>" ;
     echo "Текущий месяц: <b>" . $dc->month . "\n</b>"; 
     echo "<br>" ;
     echo "Количество лет/месяцев/дней/часов/минут/секунд в секундах: <b>".$converterSeconds['years'] . " лет " 
     . $converterSeconds['months'] . " месяцев " . $converterSeconds['days'] . " дней " 
     . $converterSeconds['hours'] . " часов ". $converterSeconds['minutes'] . " минут "
     . $converterSeconds['seconds'] . " секунд " .  "\n </b>"; 



?>
</head>
 <body>
    <form  method="post" action="">
    <p><label>Дата 1:</label><br> <input type="text" name="date_one"><br></p>
    <p><label>Дата 2:</label><br><input type="text" name="date_two"><br></p>
  <p><label>Перевод секунд:</label><br><input type="text" name="sec"><br></p>
     <input name="add" type="submit" value="Посчитать">
     </form>
</body>
   
  </html>