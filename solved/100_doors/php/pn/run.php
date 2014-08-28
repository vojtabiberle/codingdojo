<?php

  require __DIR__ . '/Door.php';
  require __DIR__ . '/Hall.php';

  $hall = new Hall( 100 );

  $hall->switchDoors();
  
  echo $hall;