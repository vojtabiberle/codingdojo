<?php

class Door
{
	private $_open = false;
	
	public function __construct($open = false)
	{
		$this->_open = $open;
	}

	public function isOpen()
	{
		return $this->_open;
	}

	public function isClosed()
	{
		return !$this->_open;
	}

	public function open()
	{
		$this->_open = true;
	}

	public function close()
	{
		$this->_open = false;
	}

	public function flip()
	{
		if($this->isOpen())
		{
			$this->close();
		}
		else
		{
			$this->open();
		}
	}

	public function __toString()
	{
		if($this->isOpen())
		{
			return '[ ] ';
		}
		else
		{
			return '[X] ';
		}	
	}
}

class Corridor
{
	private $_doorsQuantity = 100;

	private $_doors = [];
	private $_currentTempo = 1;

	public function __construct($doorsQuantity = 100)
	{
		$this->_doorsQuantity = $doorsQuantity;
		for($i = 0; $i<$this->_doorsQuantity; $i++)
		{
			array_push($this->_doors, new Door(false));
		}
	}

	public function __toString()
	{
		$out = '';
		for($i = 0; $i<$this->_doorsQuantity; $i++)
		{
			 $out .= (String)$this->_doors[$i];
		}
		return $out;
	}

	public function walk()
	{
		do
		{
			$this->oneWalk();	
			$this->_currentTempo++;
		}while($this->_currentTempo <= $this->_doorsQuantity);
	}

	private function oneWalk()
	{
		for($i = 0; $i<$this->_doorsQuantity; $i+=$this->_currentTempo)
		{
			$this->_doors[$i]->flip();
		}
	}

	public function test($tempo = 1)
	{
		$this->_currentTempo = $tempo;
		$this->oneWalk();
	}
}

$c = new Corridor(1000);
$c->walk();
echo $c;