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
		//basename ( string $path , string $suffix = "" )
		
		function get_file_names_array($path)
		{
			$files = array();
			foreach(glob($path . "*.*") as $filename)
				array_push($files, array($filename, basename($filename)));
			return $files;
		}
		
		function get_file_names($path)
		{
			$files = array();
			foreach(glob($path . "*.*") as $filename)
				array_push($files, $filename);
			return $files;
		}
		
		function save_POST_FILES($path)
		{
			$file_validity = null;
			foreach($_FILES as $file)
			{
				//if(file_exists($path . $file['name']))
				//	return array(false, "fil_twice");
				if(is_uploaded_file($file['tmp_name']) === true)
						move_uploaded_file($file['tmp_name'], $path . $file['name']);
			}
			return array(true, "fil_ok");
		}
		
		function check_files_validity()
		{
			$status = true;
			$message = 'fil_ok';
			$occurance = 0;
			foreach($_FILES as $file)
			{
				//Check file size
				$occurance = 0;
				if($file['size'] > $this->file_max_size)
				{
					$status = false;
					$message = 'fil_size';
					break;
				}
				
				foreach($_FILES as $file_occurance)
				{
					if($file['name'] == $file_occurance['name'])
						$occurance++;
				}
				
				if($occurance > 1)
				{
					$status = false;
					$message = 'fil_twice';
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
