<?php
// Blog Lite 
// Copyright (c) All Rights Reserved, NetArt Media 2003-2018
// Check http://www.netartmedia.net/blog-lite for demos and information
?><a href="http://ragnarokoldworld.online/" class="navbar-brand"><?php
	if
	(
		$this->information->blog_logo!=""
		&&
		file_exists("thumbnails/".$this->information->blog_logo.".jpg")	
	)
	{
		echo '<img src="thumbnails/'.$this->information->blog_logo.'.jpg" class="site-logo img-responsive"/>';
	}
	else
	{
		echo $this->information->blog_logo_text;
	}
	

	
	?></a>