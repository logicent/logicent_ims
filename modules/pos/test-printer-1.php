<?php

use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\Printer;

$connector = new NetworkPrintConnector("10.x.x.x", 9100);
$printer = new Printer($connector);

try {
    // ... Print stuff
} finally {
    $printer -> close();
}