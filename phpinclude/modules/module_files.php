<?php
	class Files
	{
		private $file_max_size = 2097152;
		private $unwanted_chars;
		
		function __construct()
		{
			$this->unwanted_chars = array("../", "&#46;&#46;&#47;", "&#46;&#46;&#x2F;", "&#47;&#47;&#x2E;", "&#x2F;&#x2F;&#x2E;", "passwd");	
			return;
		}
		
		function get_file_count($directory)
		{
			$file_count = new FilesystemIterator($directory, FilesystemIterator::SKIP_DOTS);
			return iterator_count($file_count);
		}
		
		function eliminatenewline($value)
		{
			return str_replace("\n", "", $value);
		}
		
		function get_file_names($path)
		{
			$files = array();
			foreach(glob($path) as $filename)
			{
				array_push($files, $filename);
			}
			return $files;
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
		
		function read_file($file_name)
		{
			//ALWAYS MAKE SURE TO PASS THE FULL HARD CODED PATH!!!!!
			//Remove all path ups
			foreach($this->unwanted_chars as $unwanted)
				$file_name = str_replace($unwanted, "", $file_name);
			return file_get_contents($file_name);
		}
		
		function get_file($file_name)
		{
			return readfile($file_name);
		}
	}
?>
