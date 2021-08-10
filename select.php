<?php
$servername = '';
$username = '';
$password = '';
$dbname = '';

$conn = mysqli_connect($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>查詢特定資料錄。</title>

    <style>
      table
      {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      td, th
      {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even)
      {
        background-color: #dddddd;
      }
    </style>
  </head>
  <body>
    <?php
      if (! $conn)
      {
        die('連線失敗：' . mysqli_connect_error());
      }
      else
      {
        echo "本次的連線成功了！<p></p>\n";
      }

      
      $current_IP = $_REQUEST['IP_text'];
      $current_Time = $_REQUEST['Time_text'];

     
      $sql = "SELECT Date_, Time_, user, SourceIP, SourcePort , DestinationIP FROM id WHERE Date_ = '$current_IP';";

      $output = mysqli_query($conn, $sql);

      if (mysqli_num_rows($output) > 0)
      {
        echo "
    <table>
      <tr>
        <th>Date_</th>
        <th> Time_</th>
        <th>user</th>
        <th>SourceIP</th>
        <th>frame.time_epoch</th>
        <th>Date</th>
       </tr>
        ";

        while ($row = mysqli_fetch_assoc($output))
        {
         
          $new_result = str_replace("\n", '<br>', $row['DestinationIP']);
         
          echo "
      <tr>
        <td>$row[Date_]</td>
        <td>$row[Time_]</td>
        <td>$row[user]</td>
        <td>$row[SourceIP]</td>
        <td>$row[SourcePort]</td>
        <td>$new_result</td>

      </tr>";
        }

        echo "</table>";
      }
      else
      {
        echo '查詢不到任何符合的資料錄...。';
      }

      mysqli_close($conn);
    ?>
  </body>
</html>