<?php
class CSV
{
	function to_csv($array)
	{
		$csv = ""; $ndx=1; $count=count($array);
		foreach($array as $item)
		{
			$csv = $csv . $item;
			if($ndx != $count)
				$csv = $csv . ",";
			$ndx++;
		}
		return $csv;
	}
}
?>
