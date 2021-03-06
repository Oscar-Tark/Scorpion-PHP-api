<?php
class Encryptor
{
	private $len;
	function __construct()
	{
		$this->len = 15;
		return;
	}
	
	function encrypt($data)
	{
		$hash = hash("sha256", $data);
		return substr($hash, 0, 24);
	}

    function to_hash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

	//(hash, string_pwd)
    function verify_password($password, $input)
    {
        return password_verify($input, $password);
    }

    function generateRandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $this->len; $i++)
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        return $randomString;
    }
    
    function getRandomStringDefaultLength()
    {
		return $this->len;
	}

	//Always use with generateRandomString
    function verifyRandomString($string, $table, $column)
    {
		//FUNCTION RETURNS STRING REGARDLESS IF A NEW TOKEN OR OLD ONE
		global $sql, $types;
	    if(!$types->ifnull($sql->return_first_row($sql->sql_get($table, $column."='".$string."'"))))
	    {
		    $var = 0;
		    while ($var <= 8)
		    {
			    if($var == 8)
					die("Unable to create transaction token");
			
			    $random = generateRandomString();
			    if($types->ifnull($sql->return_first_row($sql->sql_get($table, $column."='".$random."'"))))
			    {
				    return $random;
				    break;
			    }
			    $var++;
		    }
	    }
    	else 
		    return $string;
	}
	
    function verifyRandomString_test()
    {
	    $random = generateRandomString();
	    echo($random);
	    sql_set("testing", "1, '".$random."'");
	    $returned_random = verifyRandomString($random);
	    echo $returned_random;
	    return;
    }
}
?>
