<?php

  /**
  * @author PN @since 2014-08-13
  */
  class Door {

    const OPENED = '[ ]';
    const CLOSED = '[X]';

    /** @var boolean */
    private $isOpen;

    /**
    * @return Door
    * @author PN @since 2014-08-13
    */
    public function __construct($isOpen = FALSE) {
      if ( is_bool($isOpen) ) {
        $this->isOpen = $isOpen;
      } else {
        throw new \InvalidArgumentException();
      } // end if
    } // end method

    /**
    * @return void
    * @author PN @since 2014-08-13
    */
    public function open() {
      $this->isOpen = TRUE;
    } // end method

    /**
    * @return void
    * @author PN @since 2014-08-13
    */
    public function close() {
      $this->isOpen = FALSE;
    } // end method

    /**
    * @return boolean
    * @author PN @since 2014-08-13
    */
    public function isOpen() {
      return $this->isOpen;
    } // end method

    /**
    * @return string
    * @author PN @since 2014-08-13
    */
    public function __toString() {
      return ( $this->isOpen() ? self::OPENED : self::CLOSED );
    } // end method

  } // end class