<?php

define("HIT_PER_PAGE",3);
define("NUMBER_LINK",5);
class Paging {

public $count;
public $hit_per_page;
public $cur_page_number;
public $start;
	
public $cur_page;
public $max_page;

private $left_count;
private $right_count;
private $half;


private $previous_link ="";
private $next_link ="";
private $first_page_link ="";
private $last_page_link ="";
private $page_link_list = array();
public  $link_html = "";


	public function __construct ($count,$cur_page) {
		$this->half = (int)(NUMBER_LINK/2);
		$this->count = $count;
		$this->max_page = ceil($count / HIT_PER_PAGE );

		$cur_page = max($cur_page, 1);
		$this->cur_page = min($cur_page, $this->max_page);

		$this->start = ($this->cur_page  - 1) * HIT_PER_PAGE;
		$this->hit_per_page = HIT_PER_PAGE;

		$this->left_count = $this->cur_page - 1;
		$this->right_count = $this->max_page - $this->cur_page;

		// echo  ("Left = ".$this->left_count);
		// echo  ("Right = ".$this->right_count);

		// echo  ("current = ".$this->cur_page);
		// echo  ("max = ".$this->max_page);

		$this->setLinkHtml();
	}




	private function setLinkHtml()
	{

		$this->process();
		
		if(isset($this->first_page_link) && $this->first_page_link != "") {
			$this->link_html .= $this->first_page_link;
		}

		if(isset($this->previous_link) && $this->previous_link != "") {
			$this->link_html .= $this->previous_link;
		}


		foreach ($this->page_link_list as $page_link) {
			$this->link_html .= $page_link ;
		}


		if(isset($this->next_link) && $this->next_link != "") {
			$this->link_html .= $this->next_link;
		}

		if(isset($this->last_page_link) && $this->last_page_link != "") {
			$this->link_html .= $this->last_page_link;
		}

	}

	private function process()
	{

		if($this->cur_page >= 2) {
			$this->previous_link = $this->getLink($this->cur_page - 1 ,"<");
		}

		if($this->cur_page >= 3) {
			$this->first_page_link = $this->getLink(1 ,"<<");
		}

		if($this->cur_page <= $this->max_page -1) {
			$this->next_link = $this->getLink($this->cur_page + 1 ,">");
		}

		if($this->cur_page <= $this->max_page - 2) {
			$this->last_page_link = $this->getLink($this->max_page ,">>");
		}



		if($this->max_page <= NUMBER_LINK) {
			$this->setAllLink();
		} else{ 

			if ($this->isLeftPivot()){

				if($this->left_count <=  $this->half) {
				 	$this->setLeftPivotLink($this->left_count);
				 	$this->setCurrentLink();
				 	$this->setRightPivotLink(NUMBER_LINK - $this->left_count - 1);
				} else {
				 	$this->setLeftPivotLink($this->half);
				 	$this->setCurrentLink();
				 	$this->setRightPivotLink(NUMBER_LINK - $this->half - 1);
				}
			} else {

				if($this->right_count <=  $this->half) {

				 	$this->setLeftPivotLink(NUMBER_LINK - $this->right_count - 1);
				 	$this->setCurrentLink();
				 	$this->setRightPivotLink($this->right_count);
				} else {
				 	$this->setLeftPivotLink(NUMBER_LINK - $this->half - 1);

				 	$this->setCurrentLink();
				 	$this->setRightPivotLink($this->half);
				}
			}
		}
	}


	private function setAllLink()
	{

		for ($page = 1; $page <= $this->max_page; $page++) { 
			$this->page_link_list[] = $this->getLink($page ,"$page", $page == $this->cur_page);
		}
	}


	private function setCurrentLink()
	{
		$this->page_link_list[] = $this->getLink($this->cur_page ,"$this->cur_page" , $format_text = true);

	}

	private function setLeftPivotLink($number_link)
	{

		for ($page = $this->cur_page - $number_link ; $page < $this->cur_page ; $page++) { 
			$this->page_link_list[] = $this->getLink($page ,"$page");
		}
	}


	private function setRightPivotLink($number_link)
	{
		for ($page = $this->cur_page + 1; $page <=  $this->cur_page + $number_link; $page++) { 
			$this->page_link_list[] = $this->getLink($page ,"$page");
		}
	}


	private function isLeftPivot(){

		// echo "this->cur_page".$this->cur_page;
		// echo "this->max_page".$this->max_page;
		// echo "this->left_count".$this->left_count;
		// echo "this->right_count".$this->right_count;
		// die;


		return ($this->left_count <= $this->right_count);
	}


	private function getLink($number_page,$text, $format_text = false)
	{
		if($format_text) {
			return "<a href='list.php?page=$number_page'> <font color = blue font-weight=bold> $text </font> </a>";
		}
		return "<a href='list.php?page=$number_page'> <font color=red> $text </font> </a>";
	}

}