<?php

class Group extends AppModel{

	public $name = 'Group';
	public $hasMany = "User";
	
}