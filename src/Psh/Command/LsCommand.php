<?php

namespace Psh\Command;

class LsCommand extends BaseCommand {

	public function execute()
	{
		$response = [
			'dirs' => [],
			'files' => [],
		];
		
		if ($handle = opendir(getcwd())) {
			// loop over the contents of the directory
		    while (false !== ($entry = readdir($handle))) {
		    	if (is_dir($entry)) {
		    		$response['dirs'][] = "\033[1;36m$entry\033[0m/";
		    	} else {
		    		$response['files'][] = "\033[0m$entry\033[0m";
		    	}
		    }
		
			sort($response['dirs']);
			sort($response['files']);
			$response = join("\n", array_merge($response['dirs'], $response['files']));
			
		    closedir($handle);
		} else {
			$response = 'Error listing contents of directory \'' . getcwd() . '\'';
		}
		
		$this->response[] = $response;
	}
	
}