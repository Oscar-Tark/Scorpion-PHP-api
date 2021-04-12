<?php
class Articles
{
	private $root_folder_find;
	private $root_folder;
	public $articles;
	private $files;
	function __construct($article_folder_find, $article_root_folder)
	{
		$this->files = new Files($article_folder_find);
		$this->root_folder_find = $article_folder_find;
		$this->root_folder = $article_root_folder;
		$this->get_articles();
		return;
	}
	
	function get_articles()
	{
		$this->articles = $this->files->get_file_names($this->root_folder_find);
		return;
	}
	
	function get_article($article)
	{
		return $this->files->read_file($this->root_folder . $article);
	}
}
?>
