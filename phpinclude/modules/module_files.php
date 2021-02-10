<?php
	class Files
	{
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
					move_uploaded_file($file['tmp_name'], $path . $file['name']);
			}
			return;
		}
	}
?>
