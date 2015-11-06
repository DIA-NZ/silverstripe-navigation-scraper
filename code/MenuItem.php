<?php

class MenuItem extends DataObject {

	private static $db = array(
		'MenuSet' => 'Varchar(255)',
		'LinkText' => 'HTMLText',
		'LinkHref' => 'Text'
	);

}
