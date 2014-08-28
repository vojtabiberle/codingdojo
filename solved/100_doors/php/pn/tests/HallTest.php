<?php

  require '../Door.php';
  require '../Hall.php';

  class HallTest extends PHPUnit_Framework_TestCase {

    public function testCanSwitchDoorsTwo() {

      $expected = [
        1 => new Door( TRUE ),
        2 => new Door( FALSE ),
      ];

      $hall = new Hall( 2 );
      $hall->switchDoors();

      $this->assertEquals( $expected, $hall->getDoors() );

    } // end method

    public function testCanSwitchDoorsFive() {

      $expected = [
        1 => new Door( TRUE ),
        2 => new Door( FALSE ),
        3 => new Door( FALSE ),
        4 => new Door( TRUE ),
        5 => new Door( FALSE ),
      ];

      $hall = new Hall( 5 );
      $hall->switchDoors();

      $this->assertEquals( $expected, $hall->getDoors() );

    } // end method

    public function testHasCorrectDoorsCount() {

      $hall = new Hall( 5 );

      $this->assertEquals( 5, count($hall->getDoors()) );

      $hall->switchDoors();

      $this->assertEquals( 5, count($hall->getDoors()) );

    } // end method

  } // end class