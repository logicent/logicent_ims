<?php
/* Call this file 'test-printer.php' */
require __DIR__ . '/vendor/autoload.php';

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;

$connector = new FilePrintConnector("php://stdout");
$printer = new Printer($connector);
$printer -> text("Hello World!\n");
$printer -> cut();
$printer -> close();

// Some examples are below for common interfaces.

// Communicate with a printer with an Ethernet interface using netcat:

// php hello-world.php | nc 10.x.x.x. 9100

// A USB local printer connected with usblp on Linux has a device file (Includes USB-parallel interfaces):

// php hello-world.php > /dev/usb/lp0

// A computer installed into the local cups server is accessed through lp or lpr:

// php hello-world.php > foo.txt
// lpr -o raw -H localhost -P printer foo.txt

// A local or networked printer on a Windows computer is mapped in to a file, and generally requires 
// you to share the printer first:

// php hello-world.php > foo.txt
// net use LPT1 \\server\printer
// copy foo.txt LPT1
// del foo.txt

// If you have troubles at this point, then you should consult your OS and printer system documentation 
// to try to find a working print command.