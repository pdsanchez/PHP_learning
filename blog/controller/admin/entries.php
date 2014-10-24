<?php
	include_once("model/BlogEntryTable.class.php");
	$entryTable = new BlogEntryTable($db);
	
	$allEntries = $entryTable->getAllEntries();
	//$oneEntry = $allEntries->fetchObject();
	//$testOut = print_r($oneEntry, true);
	//return "<pre>$testOut</pre>";
	
	return include_once("view/admin/entries-html.php");
?>