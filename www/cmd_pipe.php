<?php
   define('BASE_DIR', dirname(__FILE__));
   require_once(BASE_DIR.'/config.php');

   if (strpos($_GET["cmd"],"mouse") >= 0)
   {
	    posix_mkfifo("i2cpipe", 0777);
	    $pipe = fopen("i2cpipe",'w+');
        fwrite($pipe, $_GET["cmd"]);
   }
   else
   {
	   $pipe = fopen("FIFO","w");
	   fwrite($pipe, $_GET["cmd"]."\n");
	   fclose($pipe);
   }
?>
