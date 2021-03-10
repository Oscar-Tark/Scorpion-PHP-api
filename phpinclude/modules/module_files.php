<?php
	class Files
	{
		private $file_max_size = 2097152;
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
			$file_validity = null;
			foreach($_FILES as $file)
			{
				if(is_uploaded_file($file['tmp_name']) === true)
				{
					//$file_validity = $this->check_file_validity($file);
					//if($file_validity[0] === true)
						move_uploaded_file($file['tmp_name'], $path . $file['name']);
					//else
					//	return $file_validity;
				}
			}
			return; //array(true, "success");
		}
		
		function check_files_validity()
		{
			$status = true;
			$message = "no message";
			
			foreach($_FILES as $file)
			{
				if($file['size'] > $this->file_max_size)
				{
					$status = false;
					$message = "A file chosen has a file size that exceeds 2MB. The maximum allowed file size is 2MB";
					break;
				}
			}
			return array($status, $message);
		}
		
		function get_max_file_size()
		{
			return $this->file_max_size;
		}
	}
?>
