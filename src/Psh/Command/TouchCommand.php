<?php

namespace Psh\Command;

class TouchCommand extends BaseCommand {

	public function execute()
	{
		file_put_contents($this->args[0], '');
		$this->response[] = '';
	}
	
}