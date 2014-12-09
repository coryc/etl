<?php
/**
 * Static Helper Class
 */

class Utils {
	
	/**
	 * convert an array to CSV formatted string
	 */
	public static function toCSV(array $data) {
		
		$csv = null;
		
		if (count($data) > 0) {
			
			$rows = array();
			
			$headers = array_keys($data[0]);
			
			// header row
			$_headRow = array();
			foreach($headers as $head)
				$_headRow[] = '"'.$head.'"';
			
			$rows[] = implode(',', $_headRow);
			
			// loop each row and collect all the headers
			foreach ($data as $row) {
				$_row = array();
				foreach($headers as $column) {
					$_row[] = '"'.$row[$column].'"';
							
				}
				$rows[] = implode(',', $_row);
			}
			
			if (count($rows) > 0) {
				$csv = implode("\n", $rows);
			}
		}
		
		
		return $csv;
	}
	
}
