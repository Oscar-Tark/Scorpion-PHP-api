<?php
	class Files
	{
		private $file_max_size = 2048;
		function get_file_count($directory)
		{
			$file_count = new FilesystemIterator($directory, FilesystemIterator::SKIP_DOTS);
			return iterator_count($file_count);
		}
		
		function eliminatenewline($value)
		{
			return str_replace("\n", "", $value);
		}
		
		function save_POST_FILES($path)
		{
			foreach($_FILES as $file)
			{
				if(is_uploaded_file($file['tmp_name']) === true)
				{
					if($this->check_file_validity($file)[0] === true)
						move_uploaded_file($file['tmp_name'], $path . $file['name']);
				}
			}
			return;
		}
		
		function check_file_validity($file)
		{
			$status = true;
			if($file['size'] > $this->file_max_size)
				$status = false;
			return array($status);
		}
	}
?>
