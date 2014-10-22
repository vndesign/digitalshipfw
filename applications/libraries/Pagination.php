<?php 
namespace Libraries;
if ( ! defined('INCODE')) exit('No direct script access allowed');

class Pagination
{
  protected 	$ci;

	public function __construct()
	{

	}
	public static function init($totalPage, $currentPage, $funcName, $isAjax = true) {
		$html = '<ul class="pagination">';
		for($i = 1; $i <= $totalPage; $i++) {
			//first tag
			if($i == 1) {
				if($currentPage == 1)
					$html .= '<li class="disabled"><a href="#">&laquo;</a></li>';
				elseif($isAjax) $html .= '<li><a href="#" onClick="'.$funcName.'('.$i.'); return false;">&laquo;</a></li>';
				else {
					$link = str_replace('%s', $i, $funcName);
					$html .= '<li><a href="'.$link.'">&laquo;</a></li>';
				}
			}
			//page
			if($i >= ($currentPage - 2) && $i <= ($currentPage + 2)) {
				if($i == $currentPage) {
					$html .= '<li class="active"><a href="#">'.$i.'</a></li>';
				} elseif($isAjax) $html .= '<li><a href="#" onClick="'.$funcName.'('.$i.'); return false;">'.$i.'</a></li>';
				else {
					$link = str_replace('%s', $i, $funcName);
					$html .= '<li><a href="'.$link.'">'.$i.'</a></li>';
				} 
			}

			//get last tag
			if($i == $totalPage) {
				if($currentPage == $totalPage)
					$html .= '<li class="disabled"><a href="#">&raquo;</a></li>';
				elseif($isAjax) $html .= '<li><a href="#" onClick="'.$funcName.'('.$i.'); return false;">&raquo;</a></li>';
				else {
					$link = str_replace('%s', $i, $funcName);
					$html .= '<li><a href="'.$link.'">&raquo;</a></li>';
				} 

			}
		}
		$html .= '</ul>';

		return $html;
	}
}

/* End of file pagination.php */
/* Location: ./inc/pagination.php */
