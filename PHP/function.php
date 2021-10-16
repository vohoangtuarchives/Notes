<?php
function return_uid($id)
{
	$id = dechex($id + 4091989);
	$id = str_replace(1,'I',$id);
	$id = str_replace(2,'W',$id);
	$id = str_replace(3,'O',$id);
	$id = str_replace(4,'U',$id);
	$id = str_replace(5,'Z',$id);
	return strtoupper($id);
}
function return_id($id)
{
	$id = str_replace("I",1,$id);
	$id = str_replace("W",2,$id);
	$id = str_replace("O",3,$id);
	$id = str_replace("U",4,$id);
	$id = str_replace("Z",5,$id);
	$id = hexdec($id) - 4091989;

	return strtolower($id);
}
function randomNumberWithLength($length) {
    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}

    function readStdin()
    {
        $in = fopen("php://stdin", "r");
        $input = fgets($in, 1000);
        return $input;
    }
    function toArray($input){
        $result = [];
        $tmpArray = explode(' ',$input);
        $result['arr'] = $tmpArray;
        $result['length'] = count($tmpArray);
        return $result;
    }
    function toInt($int){
        return intVal($int);
    }

    $input = toArray(readStdin());

    $count = 0;

    $first_number = array_shift($input['arr']) + 1;

    foreach($input['arr'] as $number){
        while(toInt($number) > $first_number){
            echo $first_number++;
            echo ' ';
        }
         $first_number = $number+1;
    }