<?php
class MOTOR {
	public $DATA_FILE = '';
	public $TEMP_ARRAY = array();
	public $ACTUAL_PAGE = '';
	
	function MOTOR($data_file) {
		$this->DATA_FILE = $data_file;
		$this->ACTUAL_PAGE = pathinfo ($_SERVER ['PHP_SELF']);
		$handle = fopen ($this->DATA_FILE, "r");
		if ($handle) {
			while (! feof ($handle)) {
				$buffer = fgets ($handle, filesize ($this->DATA_FILE));
				$row = explode ("|", $buffer);
				array_push ($this->TEMP_ARRAY, $row);
			}
			fclose ($handle);
		} else {
			die ("Az adat fájlt nem lehet olvasni!");
		}
	}
	
	function print_meta() {
		print "\n<!-- Dynamic meta -->\n";
		foreach ($this->TEMP_ARRAY as $position) {
			if ($this->ACTUAL_PAGE ['basename'] == $position [1]) {
				print "<meta name=\"description\" content=\"" . $position [3] . "\">\n";
				print "<title>" . $position [2] . "</title>\n";
			}
		}
		print "<!-- End dynamic meta -->\n\n";
	}
	
	function print_article_title() {
		print "\n<!-- Dynamic article title -->\n";
		foreach ($this->TEMP_ARRAY as $position) {
			if ($this->ACTUAL_PAGE ['basename'] === $position [1]) {
				print "\t\t\t<h2>" . $position [2] . "</h2>";
			}
		}
		print "\n<!-- End dynamic article title -->\n";
	}
	
	function print_menu() {
		print "\n<!-- Dynamic menu -->\n";
		print "\t\t\t<div class=\"gray_bg\">\n\t\t\t\t<ul>";
		foreach ($this->TEMP_ARRAY as $position) {
			$file_path = pathinfo ($position [1], PATHINFO_BASENAME);
			print "\n\t\t\t\t\t<li><a href=\"" . $file_path . "\" title=\"" . $position [2] . "\">" . $position [0] . "</a></li>";
		}
		print "\n\t\t\t\t</ul>\n\t\t\t</div>";
		print "\n<!-- End dynamic menu -->\n\n";
	}
}
?>