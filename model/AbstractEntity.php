<?php

abstract class AbstractEntity
{
    protected int $id;

    public function __construct($data)
    {
        if($data != null)
        {
            $this->hydrate($data);
        }
    }

    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $key = str_replace("_", "", ucwords($key,"_"));
            $method = "set" . $key;
            if(method_exists($this,$method))
            {
                $this->$method($value);
            }
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $newId)
    {
        $this->id = $newId;
    }

}