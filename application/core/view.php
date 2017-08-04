<?php
class View
	{
	public 	function render($content_view, $template_view, $model = null)
		{
		include 'application/views/templates/' . $template_view;

		}

	public 	function redirect($url = null)
		{
		header("location:{$url}");
		}
	}
?>
