<?php

  /**
  * @author PN @since 2014-08-13
  */
  class Hall {

    /** @var integer */
    private $doorsCount = 0;

    /** @var array */
    private $doors = [];

    /**
    * @return Hall
    * @access public
    * @author PN @since 2014-08-13
    */
    function __construct($limit = 0) {

      if ( is_integer($limit) && $limit >= 0 ) {
        $this->doorsCount = $limit;
        $this->init();
      } else {
        throw new \InvalidArgumentException();
      } // end if

    } // end method

    /**
    * @return void
    * @author PN @since 2014-08-13
    */
    private function init() {
      for ( $i = 1; $i <= $this->doorsCount; $i++ ) {
        $this->doors[$i] = new Door();
      } // end for
    } // end method

    /**
    * @return void
    * @author PN @since 2014-08-13
    */
    public function switchDoors() {

      $step = 1;
      while ( $step <= $this->doorsCount ) {

        for ( $i = 1; $i <= $this->doorsCount; $i++ ) {

          if ( $i % $step === 0 ) {

            if ( $this->doors[$i]->isOpen() ) {
              $this->doors[$i]->close();
            } else {
              $this->doors[$i]->open();
            } // end if

          } // end if

        } // end for

        ++$step;
      } // end while

    } // end method

    /**
    * @return array
    * @author PN @since 2014-08-13
    */
    public function getDoors() {
      return $this->doors;
    } // end method

    /**
    * @return void
    * @author PN @since 2014-08-13
    */
    public function __toString() {

      $o = "";

      foreach ( $this->doors as $door ) {
        $o .= (string) $door;
        $o .= ' ';
      } // end foreach

      return $o;

    } // end method

  } // end class