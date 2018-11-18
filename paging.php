<?php

define("HIT_PER_PAGE",3);

class Paging {

public $count;
public $hit_per_page;
public $page_number;
public $start;
	
public $max_page;

	public function __construct ($count,$page) {
		$this->count = $count;
		$this->max_page = ceil($count / HIT_PER_PAGE );

		$page = max($page, 1);
		$this->page = min($page, $this->max_page);

		$this->start = ($this->page  - 1) * HIT_PER_PAGE;
		$this->hit_per_page = HIT_PER_PAGE;
	}


}