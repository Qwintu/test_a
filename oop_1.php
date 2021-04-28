<?php
  header('Content-type: text/html; charset=utf-8');
  /* В нашей вселенной у людей изначально 100ед. здоровья */
  /* В нашей вселенной у людей не может быть больше 100ед. здоровья*/
  /*
    Создать дедушку по маминой линии
    Создать бабушку по папиной линии
    Создать дедушку по папиной линии
    Доработать getInfo так, чтобы метод выводил всю информацию про бабушек и дедушек.
  */
  class Person{
    private $name;
    private $age;
    private $hp;  // health
    private $mother;
    private $father;
    
    function __construct($name,$age,$mother,$father){
      $this->name = $name;
      $this->age = $age;
      $this->hp = 100;
      $this->mother = $mother;
      $this->father = $father;
    }
    
    function getMother(){return $this->mother;}
    function getfather(){return $this->father;}
    function getName(){return $this->name;}
    function getHp(){return $this->hp."ед.";} 
    function getAge(){return $this->age;}
    
    function sayHi($name,$age1){
      echo "Привет $name, меня зовут ".$this->name.". Тебе ".$age1." лет?";
    }

    function setHp($hp){   // не позволяет установить здоровье больше 100, использовалось в ранних версиях файла
      if($this->hp + $hp >= 100) $this->hp = 100;
      else $this->hp = $this->hp + $hp;
    }
    
    function getInfo(){
      $info = "Привет, меня зовут ".$this->name."<br>
               Мне ".$this->age." лет<br>";
      if($this->mother != null){
        $info .= "Мою маму зовут ".$this->mother->getName()."<br>";
        if($this->mother->getMother() != null){
          $info .= "Бабушку по маминой линии зовут ".$this->mother->getMother()->getName()."<br>";
          $info .= "Дедушку по маминой линии зовут ".$this->mother->getfather()->getName()."<br>";
        }
      }
      if($this->father != null){
        $info .= "Папу зовут ".$this->father->getName()."<br>";
        if($this->mother->getMother() != null){
          $info .= "Бабушку по папиной линии зовут ".$this->father->getMother()->getName()."<br>";
          $info .= "Дедушку по папиной линии зовут ".$this->father->getfather()->getName()."<br>";
        }
      }
      echo $info;
    }
  }
  
  $nina = new Person("Нина",70); // Бабушка по маминой линии
  $foma = new Person("Фома",72); // Дедушка по маминой линии
  $dasha = new Person("Даша",69); // Бабушка по папиной линии
  $ivan = new Person("Иван",71); // Дедушка по папиной линии
  $oleg = new Person("Олег",34,$dasha,$ivan); // папа
  $olga = new Person("Ольга",34,$nina,$foma); // мама
  $igor = new Person("Игорь",10,$olga,$oleg);
  echo $igor->getInfo();
  // echo $oleg->sayHi($igor->name);
  echo $igor->sayHi($ivan->getName(),$ivan->getAge());
?>

