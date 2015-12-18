<?php
    header("Content-Type:text/html;charset=utf-8");
    
    class JiSuan {
    	public $num_1;
    	public $num_2;
    	public $oper;
    	public $result;

    	function __construct($num_1='',$num_2='',$oper=''){
    		$this->num_1=$num_1;
    		$this->num_2=$num_2;
    		$this->oper=$oper;
    	}

    	function calculate() {
    		switch ($this->oper) {
    			case '+':
    				$this->result = $this->num_1 + $this->num_2;
    				break;
    			case '-':
    			    $this->result = $this->num_1 - $this->num_2;
    				break;
    			case '*':
    			    $this->result = $this->num_1 * $this->num_2;
    			    break;
    			case '/':
    			    $this->result = $this->num_1 / $this->num_2;
    			    break;
    		}
    		return $this->result;
    	}
    }
    $way = new JiSuan($_GET['Num_1'],$_GET['Num_2'],$_GET['oper']);
    $result = $way->calculate();
    echo '计算结果：'.$result;
?>