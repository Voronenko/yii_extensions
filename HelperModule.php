<?php
class HelperModule extends CWebModule
{

	public function init()
	{
		// Set required classes for import.
		$this->setImport(array(
			'constants.components.*',
			'constants.components.behaviors.*',
			'constants.components.dataproviders.*',
			'constants.controllers.*',
			'constants.models.*',
		));

	public function getVersion()
	{
		return '1.0.0';
	}
}
