<?php

class CMFFileUpload extends CBaseEditorWidget {

    protected
      $publishedpath;

    public $assetspath = "vendor.blueimp.jquery-file-upload.js";
	public $view = "CMFFileUpload";
	public $initJs = null;

	public function init(){
		$this->registerClientScripts();
        $am = Yii::app()->assetManager;

        $realpath = Yii::getPathOfAlias($this->assetspath);

        $this->publishedpath = $am->publish($realpath );
	}

	public function run(){
		$this->renderFile( __DIR__  .DIRECTORY_SEPARATOR .'views'. DIRECTORY_SEPARATOR .$this->view.'.php');
	}

	private function registerClientScripts(){
		$assetsPath = Yii::getPathOfAlias('jquery-file-upload');

		$cs = Yii::app()->clientScript;
		$am = Yii::app()->assetManager;

		$cs->registerCoreScript('jquery');
		$cs->registerCoreScript('jquery.ui');

		$cs->registerScriptFile('//ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js', CClientScript::POS_END); // TODO: copy to assets
		$cs->registerPackage("jquery.ui");
		$cs->registerScriptFile($this->publishedpath.DIRECTORY_SEPARATOR.'jquery.fileupload.js', CClientScript::POS_END);
		$cs->registerScriptFile($this->publishedpath.DIRECTORY_SEPARATOR.'jquery.fileupload-ui.js', CClientScript::POS_END);
		$cs->registerScriptFile($this->publishedpath.DIRECTORY_SEPARATOR.'jquery.iframe-transport.js', CClientScript::POS_END);
		$cs->registerCssFile($this->publishedpath.DIRECTORY_SEPARATOR.'jquery.fileupload-ui.css');

	}
}
?>
