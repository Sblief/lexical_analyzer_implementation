<?php
class Processor
{
    public function process($data)
    {
        $tokens = preg_split('/[\s]+/', $data );
        foreach ($tokens as $key => $token)
        {
            $token = str_replace(array(';', ','), '' , $token);
            $data1 = array();
            if ($this->check_header($token)){
                $data1['header'][] = $token;
                echo "<br>"."'".$token."'"." => "."Header".", ";
            }
            elseif ($this->check_method($token)){
                $data1['method'][] = $token;
                echo "<br>"."'".$token."'"." => "."Method".", ";
            }
            elseif($this->check_number($token))
            {
                $data1['number'][] = $token;
                echo "<br>"."'".$token."'"." => "."Number".", ";

            }
            elseif($this->check_letter($token))
            {
                if($this->check_condition($token))
                {
                    $data1['number'][] = $token;
                    echo "<br>"."'".$token."'"." => "."Condition".", ";
                }
                else{
                    $data1['id'][] = $token;
                    echo "<br>"."'".$token."'"." => "."ID".", ";
                }
            }
            elseif($this->check_relop($token))
            {
                $data1['relop'][] = $token;
                echo "<br>"."'".$token."'"." => "."Relational Operator".", ";

            }
        }
    }

    public function check_header($data)
    {
        if (stripos($data, "#include") !== false) {
           return true;
        }
    }

    public function check_method($data)
    {
        if (stripos($data, "main") !== false) {
            return true;
        }
    }
    public function check_number($data)
    {
        if (is_numeric($data)) {
            return true;
        }
    }
    public function check_letter($data)
    {
        if (!preg_match('/[^A-Za-z0-9]/', $data))
        {
            return true;
        }
    }
    public function check_condition($data)
    {
        if(preg_match('(if|else|then)', $data) === 1) {
            return true;
        }
    }
    public function check_relop($data)
    {
        if(preg_match('(<|<=|>=|=|>)', $data) === 1) {
            return true;
        }
    }
}