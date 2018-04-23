<?php

namespace PDO\src;

class Project
{
	protected $pid;
  protected $name;

  public function __construct(\StdClass $data = null) {
    if ($data) {
      $this->setPid($data->pid);
      $this->setName($data->name);
    }
  }

  public function setPid($pid) {
  	$this->pid = $pid;
  	return $this;
  }

  public function getPid() {
  	return $this->pid;
  }

  public function getName()
  {
    return $this->name;
  }
 
  public function setName($name)
  {
    $this->name = $name;
    return $this;
  }
}