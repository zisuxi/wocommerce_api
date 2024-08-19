<?php
$fruitGroups = array(
    array('apple', 'banana', 'cherry'),
    array('grape', 'orange', 'pear'),
    array('kiwi', 'mango', 'pineapple')
);

$array= ['apple','banana','cherry'];
$msg= "";
foreach ($fruitGroups as $group =>$value) {
 if(in_array("apple",$array)){
    $msg="Array is  match and then execute it";
 }
 if(array_search("apple",$value)){
      echo $value;
 }
}
if ($msg) {  
    echo $msg;
}

?>
