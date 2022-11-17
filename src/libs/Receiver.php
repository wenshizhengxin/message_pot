<?php

namespace wenshizhengxin\message_pot\libs;

class Receiver
{
    private $id;
    private $role;
    private $dept;

    public function __construct($id = 0, $role = 0, $dept = 0)
    {
        $this->id = $id;
        $this->role = $role;
        $this->dept = $dept;
    }

    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setRole($role)
    {
        return $this->role = $role;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setDept($dept)
    {
        return $this->dept = $dept;
    }

    public function getDept()
    {
        return $this->dept;
    }
}
