<?
/*			GNU GENERAL PUBLIC LICENSE
TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
GNU GENERAL PUBLIC LICENSE
Version 2, June 1991

*/

// Simple F5 refresh so you dont need to keep clicking to find a deal :)
// by http://twitter.com/rhcp011235
// Follow me for more cool stuff!
        while(1)
        {
                // Lets add a sleep so we dont kill our thread.
                sleep(1);

                // URL to refresh
                $url = "http://www.cowboom.com/product/1539211";

                //Do the magic trick
                // Do not change here unless you know what you are doing.
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_VERBOSE, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  2);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_ENCODING, "x-www-form-urlencoded");

                $result = curl_exec($ch);
                curl_close($ch);

                // Catch th response string you want to catch.
                // For cowboom it was "SORRY" which meant out of stock. 
                if (!strstr($result,"sorry"))
                {
                        // Echo to term
                        echo "GO GET IT\n";

                        // Beep the term so you dont need to look at it!
                        echo "\x07";
                }
        }

?>
