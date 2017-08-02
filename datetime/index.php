<?php

date_default_timezone_set('Europe/Zagreb');

$date = new DateTime();

echo $date->format('dS M Y');
echo $date->getTimestamp();
echo $date->getTimezone()->getName();


$date = DateTime::createfromFormat('Y-m-d', '1987-03-29');
echo $date->format('dS M Y');


$date->setTimestamp(1500903484);
echo $date->format('d.m.Y');


$date->setDate(2016, 11, 16);
$date->setTime(12, 30, 45);
echo $date->format('Y-m-d H:i:s');


$date->add(new DateInterval('P10DT2H'));
$date->sub(new DateInterval('P10DT2H'));
$date = new DateTime('+2 days 5 hours');
$date->setDate(2016, 11, 16);
$date->modify('+2 days');


$myBirthday = (new DateTime('29 March'))->setTime(3,0,0);
$timeUntilBirthday = $date->diff($myBirthday);
echo $timeUntilBirthday->format('%m months %d days %h hours');


$date2 = new DateTime('2016-12-01');
if ($date > $date2) {
    echo 'yes';
} else {
    echo 'no';
}


$date->setTimezone(new DateTimeZone('Europe/Zagreb'));
$date = new DateTime('now', new DateTimeZone('Europe/Zagreb'));
var_dump(DateTimeZone::listIdentifiers());


$start = new DateTime();
$start->setTime(10, 0, 0);
$end = clone $start;
$end->setTime(18, 0, 0);
$interval = new DateInterval('PT1H');
$dateRange = new DatePeriod($start, $interval, $end);

foreach ($dateRange as $date) {
    var_dump($date);
}


echo time(); // Unix timestamp
echo microtime();
echo date('d M Y');
var_dump(checkdate(7, 32, 2017));
timezone_identifiers_list(); // Same like DateTimeZone::listIdentifiers()