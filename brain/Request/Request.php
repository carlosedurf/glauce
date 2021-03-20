<?php

namespace Glauce\Request;

class Request
{

    private $requests;

    public function __construct()
    {

        $this->requests = $_REQUEST;
    }

    public function getAll()
    {
        return $this->requests;
    }

    public function getPost()
    {
        return $_POST;
    }

    public function getGet()
    {
        return $_GET;
    }

    public function filter()
    {
        return [
            //
        ];
    }

    public function valid(array $data = [])
    {
        if(count($data)){
            $inputs = $data;
        }else{
            $inputs = $this->filter();
        }

        return array_filter($this->getAll(), function ($input) use($inputs){
            $inputsKeys = array_keys($inputs);
            return in_array($input, $inputsKeys) ? true : false;
        }, ARRAY_FILTER_USE_KEY);
    }
    
}