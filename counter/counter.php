<?php

function getOS($userAgent) {
  // Create list of operating systems with operating system name as array key 
	$oses = array (
		'iPhone' => '(iPhone)',
                'iPad' => '(iPad)',
		'Windows 3.11' => 'Win16',
		'Windows 95' => '(Windows 95)|(Win95)|(Windows_95)', // Use regular expressions as value to identify operating system
		'Windows 98' => '(Windows 98)|(Win98)',
		'Windows 2000' => '(Windows NT 5.0)|(Windows 2000)',
		'Windows XP' => '(Windows NT 5.1)|(Windows XP)',
		'Windows 2003' => '(Windows NT 5.2)',
		'Windows Vista' => '(Windows NT 6.0)|(Windows Vista)',
		'Windows 7' => '(Windows NT 6.1)|(Windows 7)',
                'Windows 8' => '(Windows NT 6.2)|(Windows 8)',
                'Windows 8.1' => '(Windows NT 6.3)|(Windows 8.1)',
                'Windows 10' => '(Windows NT 6.4)|(Windows 10)',
		'Windows NT 4.0' => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
		'Windows ME' => 'Windows ME',
		'Open BSD'=>'OpenBSD',
		'Sun OS'=>'SunOS',
		'Linux'=>'(Linux)|(X11)',
		'Safari' => '(Safari)',
		'Macintosh'=>'(Mac_PowerPC)|(Macintosh)',
		'QNX'=>'QNX',
		'BeOS'=>'BeOS',
		'OS/2'=>'OS/2',
		'Search Bot'=>'(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp/cat)|(msnbot)|(ia_archiver)'
	);

	foreach($oses as $os=>$pattern){ // Loop through $oses array
    // Use regular expressions to check operating system type
		if(eregi($pattern, $userAgent)) { // Check if a value in $oses array matches current user agent.
			return $os; // Operating system was matched so return $oses key
		}
	}
	return 'Unknown'; // Cannot find operating system so return Unknown
}


function counter()
{
    $referer=$_GET['r'];
    if ($referer === ""){$referer='none';}
    
    $file = 'full-path-to/counter/counter.txt';
    // Open the file to get existing content
    $counter = file_get_contents($file);

    if ($_COOKIE["counter"] !== "counterSet")
    {
        $counter = $counter + 1;
        // Write the contents back to the file
        file_put_contents($file, $counter);
        
        // Set Cookie 3600s for timeout to prevent counter going up on reload
        $value = 'counterSet';
        setcookie("counter", $value, time()+3600);

        // LOG to Database
        $sqltime=date("Y-m-d H:i:s");
        $sqlOS=getOS($_SERVER['HTTP_USER_AGENT']);
        
        mysql_connect("localhost", "username-for-db-counter","password-for-db-counter") or die ("Keine Verbindung moeglich");
        mysql_select_db("counter") or die ("Die Datenbank existiert nicht.");
        
        $sql="INSERT INTO logging (time, ipaddress, useragent, referer, osversion)
        VALUES
        ('$sqltime','$_SERVER[REMOTE_ADDR]','$_SERVER[HTTP_USER_AGENT]','$referer','$sqlOS')";

        if (!mysql_query($sql))
          {
          die('Error: ' . mysql_error());
          exit();
          }
        //echo "1 record added";
        
    
    }

    Return($counter);
    
}

$newcount=counter();
echo str_pad($newcount, 10, '0', STR_PAD_LEFT);


?>
