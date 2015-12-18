<?php
	header("Content-Type:text/html;charset=utf-8");

	class Wuli{
		public $h;
		public $g;
		public $time;
		public $vx;
		public $vy;
		public $x;
		public $y;
	
	
		function __construct($h=0,$g=0,$time=0,$vy=0){
			$this->h = $h;
			$this->g = $g;
			$this->time = $time;
			$this->vy = $vy;
		}
		

		function T1y(){
			$this->y = $this->h - $this->g * $this->time * $this->time * 0.5;
			return $this->y;
		}
		function T1x(){
			$this->x=0;
			return $this->x;
		}
		function T2y(){
			$this->y = $this->h - 0.5 * $this->g * $this->time * $this->time;
			return $this->y;
		}
		function T2x(){
			$this->x = 0.5 * $this->g * $this->time * $this->time;
			return $this->x;
		}
		function T3y(){
			$this->y = $this->vy * $this->time - 0.5 * $this->g * $this->time * $this->time + $this->h;
			return $this->y;
		}
		function T3x(){
			$this->x = 0.5 * $this->g * $this->time * $this->time;
			return $this->x;
		}
	}
		$t1y = new Wuli(10,10,1);
		$t1x = new Wuli();
		$t2y = new Wuli(10,10,1);
		$t2x = new Wuli(0,10,1);
		$t3x = new Wuli(0,10,1);
		$t3y = new Wuli(10,10,1,10);
		$x1 = $t1x->T1x();
		$y1 = $t1y->T1y();
		$x2 = $t2x->T2x();
		$y2 = $t2y->T2y();
		$x3 = $t3x->T3x();
		$y3 = $t3y->T3y();
		echo "坐标1：".$x1,$y1;
		echo "坐标2：".$x2,$y2;
		echo "坐标3：".$x3,$y3;
		?>
