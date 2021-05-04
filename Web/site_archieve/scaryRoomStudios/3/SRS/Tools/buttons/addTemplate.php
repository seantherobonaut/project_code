<br style="clear:both">
<form method="post" action="/?requestproxy=addTemplate" style="display: inline-block;float: right;border: 1px dashed white;margin:15px;padding:7px;">
	<p style="margin-right:7px">Add Template</p>
	<input type="hidden" name="parent_id" value="<?php echo $parentID;?>">
	<select name="template_type" style="margin-left:-1px">
		<?php
			//Maybe add a list of templates so this doens't have to search all files every time it is used
			$fSearchObj = new SysFileSearch;
			$templates = array();
			foreach($fSearchObj->getFiles("TemplateClass.php") as $key => $value) 
			{
				$temp = basename($value);
				$temp = str_replace('Class.php', '', $temp);
				array_push($templates, $temp);
			}
		
			foreach($templates as $entry)
			{
				if($entry!='mainTemplate' && $entry!='Error404Template')
					echo '<option value="'.$entry.'">'.$entry.'</option>';							
			}
		?>
	</select>
	<input type="submit" value="insert">
</form>
<br style="clear:right">

