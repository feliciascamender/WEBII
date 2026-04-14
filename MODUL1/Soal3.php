<?php
$celcius = 37.841;
$fahrenheit = 1.8 * $celcius + 32;
$reamur = 0.8 * $celcius;
$kelvin = $celcius + 273.15;
echo sprintf("Fahrenheit: %.4f <br>", $fahrenheit);
echo sprintf("Reamur: %.4f <br>", $reamur);
echo sprintf("Kelvin: %.4f <br>", $kelvin);