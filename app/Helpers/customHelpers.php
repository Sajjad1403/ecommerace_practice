<?php
use Carbon\Carbon;

function dateFormat($date)
{
  $date = (Carbon::parse($date)->format('d'). ' ' . Carbon::parse($date)->format('F'). ',' . carbon::parse($date)->format('Y') );
  return $date;
}


?>