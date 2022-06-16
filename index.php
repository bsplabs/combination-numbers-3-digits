<?php

class Combination3Digits
{
  private $numbers = [];

  public function __construct($startNumber = 100, $endNumber = 109)
  {
    for ($i = $startNumber; $i <= $endNumber; $i++) {
      if ($i == ($i % 10)) $number = "00" . $i;
      elseif ($i == ($i % 100)) $number = "0" . $i;
      elseif ($i == ($i % 1000)) $number = $i;

      if (!$this->checkDupCombinationNumber($number)) {
        $this->numbers[] = $number;
      }
    }
  }

  public function checkDupCombinationNumber($numbStr)
  {
    $numbCombArr = $this->getCombinationNumber($numbStr);
    foreach ($numbCombArr as $numbComb) {
      if (in_array($numbComb, $this->numbers)) {
        return true;
      }
    }
    return false;
  }

  public function getCombinationNumber($numbStr)
  {
    $setCombNumbers = [];
    if (in_array(3, array_count_values(str_split($numbStr)))) {
      $setCombNumbers[] = $numbStr;
    }
    // elseif (in_array(2, array_count_values(str_split($numbStr)))) {
    // } 
    else {
      for ($i = 0; $i < 3; $i++) {
        $setCombNumbers[] = $this->swap($numbStr, 0, $i);
        $n = count($setCombNumbers);
        $setCombNumbers[] = $this->swap($setCombNumbers[$n - 1], 1, 2);
      }
    }

    return $setCombNumbers;
  }

  public function swap($numbStr, $i, $j)
  {
    $temp = 0;
    $charArray = str_split($numbStr);
    $temp = $charArray[$i];
    $charArray[$i] = $charArray[$j];
    $charArray[$j] = $temp;
    return implode("", $charArray);
  }

  public function result()
  {
    echo "<pre>";
    print_r($this->numbers);
    echo "</pre>";
  }
}

$combNumber = new Combination3Digits();
$combNumber->result();