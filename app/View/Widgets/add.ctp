<?php
	if($error != false){
		echo $this->element('error'); 
	} else {
		echo $this->element('widget_add');
	}
