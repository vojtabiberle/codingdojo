<?php

  require '../Door.php';

  class DoorTest extends PHPUnit_Framework_TestCase {

    public function testCanSwitchStatus() {

      $door = new Door();

      $door->open();

      $this->assertTrue( TRUE, $door->isOpen() );
      
      $door->close();
      
      $this->assertFalse( FALSE, $door->isOpen() );

    } // end method

  } // end class