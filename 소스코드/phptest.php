<?php
	session_start();
	echo $_GET['id'] . " " . $_GET['pw'] . "<br>";
	
	if (isset($_COOKIE["firstCookie"]))
		echo "First Cookie = " . $_COOKIE["firstCookie"] . "<br>";
	else
		setCookie("firstCookie", "asdasdasd", time() + 5);
	
	
	if (isset($_SESSION['user']))
        echo $_SESSION['user'] . "<br>";
    else
        $_SESSION['user'] = 'firstUser';
	
	
    $fruit = array();
    $fruit[0] = "apple";
    $fruit[1] = "banana";

    $fruit[4] = "aaaaa";

    $fruit[3][4] = "hahaha";
    $fruit["aaa"][44] = "abababab";	
	
	echo "OOKK"."<br>";
	
	$testData[0] = "bbb";
    $testData[1] = "aaa";
    $testData[2] = "ccc";
    $testData[3] = "ddd";
    $testData[4] = "eee";
    $testData[5] = "fff";
	
	function test($aaa, $bbb) {
		return $aaa + $bbb;
	}	
?>

<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <?php 
            if ($fruit[0] == "apple")
                echo "APPLE!!!<br>";
			
			for ($i = 0; $i < count($testData); $i++)
                echo $testData[$i] . " ";
            echo "<br>";
			
			echo test(5, 2) . "<br>";
        ?>
        PHP Hello
        <?php
            echo "World" . "<br>"; 
            echo $fruit . "<br>";
            print_r($fruit);
            echo "<br>";
            var_dump($fruit);
        ?>


    </body>

</html>