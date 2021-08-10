<?php

$db = new mysqli('178.128.216.144','root','Backend!@#2021Test','Acom');

$file = fopen('dns_sample1.csv','r');
if($file!==FALSE)    {
        while(( $row =fgetcsv($file)) !== FALSE)
        {
            $db->query('INSERT INTO `id`(`Date_`, `Time_`, `user`, `SourceIP`, `SourcePort`, `DestinationIP`, `DestinationPort`, `DNS`) VALUES ("'.$row[1].'","'.$row[2].'","'.$row[3].'","'.$row[4].'","'.$row[5].'","'.$row[6].'","'.$row[7].'","'.$row[8].'")');

        }
    }
?>