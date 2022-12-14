<?php
header('Content-type: text/html; charset=utf-8');

$content = file_get_contents('artikel.csv');

$array = explode("\r\n", $content);

$table = '<table>';

/*
echo '<pre>';
print_r( $array );
echo '</pre>';
*/

$row = 0;
foreach( $array as $line ):

  if ( $row == 0 ) {

    // nur die erste Zeile (th)
    $table .= ' <tr>';

    $ths = explode( "\t", $line );
    foreach ( $ths as $th ):
      $table .= '<th>' . $th . '</th>';
    endforeach;

    //neu ergänzt
    $table .= '<th> ID</th>' ; // <tags> müssen immer geclosed werden </tags>

    $table .= ' </tr>';

  } else {

    // rest der Tabelle
    $table .= ' <tr>';

    // Wir fügen eine neue table data
    $table .= '<td>' . $row . '</td>';

    $tds = explode( "\t", $line );
    foreach ( $tds as $td ):
      $table .= '<td>' . $td . '</td>';
    endforeach;

    $table .= ' </tr>';
  }

  $row++;
endforeach;

$table .= '</table>';

echo $table;
