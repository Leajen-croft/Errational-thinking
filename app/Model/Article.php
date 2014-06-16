<?php
App::uses('AppModel', 'Model');
class Article extends AppModel{
	
	public $validate = array(
		'title' => 'notEmpty',
		'filename_image' => array(
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Something went wrong with the file upload',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			),
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
			'mimeType' => array(
				'rule' => array('mimeType', array('image/gif','image/png','image/jpg','image/jpeg')),
				'message' => 'Invalid file, only images allowed',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			),
			// custom callback to deal with the file upload
			'processUpload' => array(
				'rule' => 'processUpload',
				'message' => 'Something went wrong processing your file',
				'required' => FALSE,
				'allowEmpty' => TRUE,
				'last' => TRUE,
			)
		),
			'filename_magazine' => array(
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Something went wrong with the file upload',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			),
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
			'mimeType' => array(
				'rule' => array('mimeType', array('application/pdf')),
				'message' => 'Invalid file, only pdf allowed',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			),
			// custom callback to deal with the file upload
			'processUpload2' => array(
				'rule' => 'processUpload2',
				'message' => 'Something went wrong processing your file',
				'required' => FALSE,
				'allowEmpty' => TRUE,
				'last' => TRUE,
			)
		)
    );
/**
 * Upload Directory relative to WWW_ROOT
 * @param string
 */
public $uploadDir1 = 'uploads/images';
public $uploadDir2 = 'uploads/magazines';

/**
 * Process the Upload
 * @param array $check
 * @return boolean
 */
public function processUpload($check=array()) {
	// deal with uploaded file
	if (!empty($check['filename_image']['tmp_name'])) {

		// check file is uploaded
		if (!is_uploaded_file($check['filename_image']['tmp_name'])) {
			return FALSE;
		}

		// build full filename_image
		$filename_image = WWW_ROOT . $this->uploadDir1 . DS . Inflector::slug(pathinfo($check['filename_image']['name'], PATHINFO_FILENAME)).'.'.pathinfo($check['filename_image']['name'], PATHINFO_EXTENSION);

		// @todo check for duplicate filename_image

		// try moving file
		if (!move_uploaded_file($check['filename_image']['tmp_name'], $filename_image)) {
			return FALSE;

		// file successfully uploaded
		} else {
			// save the file path relative from WWW_ROOT e.g. uploads/example_filename_image.jpg
			$this->data[$this->alias]['filepath_1'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $filename_image) );
		}
	}

	return TRUE;
}
public function processUpload2($check=array()) {
	// deal with uploaded file
	if (!empty($check['filename_magazine']['tmp_name'])) {

		// check file is uploaded
		if (!is_uploaded_file($check['filename_magazine']['tmp_name'])) {
			return FALSE;
		}

		// build full filename_magazine
		$filename_magazine = WWW_ROOT . $this->uploadDir2 . DS . Inflector::slug(pathinfo($check['filename_magazine']['name'], PATHINFO_FILENAME)).'.'.pathinfo($check['filename_magazine']['name'], PATHINFO_EXTENSION);

		// @todo check for duplicate filename_magazine

		// try moving file
		if (!move_uploaded_file($check['filename_magazine']['tmp_name'], $filename_magazine)) {
			return FALSE;

		// file successfully uploaded
		} else {
			// save the file path relative from WWW_ROOT e.g. uploads/example_filename_magazine.jpg
			$this->data[$this->alias]['filepath_2'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $filename_magazine) );
		}
	}

	return TRUE;
}

/**
 * Before Save Callback
 * @param array $options
 * @return boolean
 */
public function beforeSave($options = array()) {
	// a file has been uploaded so grab the filepath
	if (!empty($this->data[$this->alias]['filepath_1'])) {
		$this->data[$this->alias]['filename_image'] = $this->data[$this->alias]['filepath_1'];
	}
	if (!empty($this->data[$this->alias]['filepath_2'])) {
		$this->data[$this->alias]['filename_magazine'] = $this->data[$this->alias]['filepath_2'];
	}

	return parent::beforeSave($options);
}
/**
 * Before Validation
 * @param array $options
 * @return boolean
 */
public function beforeValidate($options = array()) {
	// ignore empty file - causes issues with form validation when file is empty and optional
	if (!empty($this->data[$this->alias]['filename_image']['error']) && $this->data[$this->alias]['filename_image']['error']==4 && $this->data[$this->alias]['filename_image']['size']==0) {
		unset($this->data[$this->alias]['filename_image']);
	}
	if (!empty($this->data[$this->alias]['filename_magazine']['error']) && $this->data[$this->alias]['filename_magazine']['error']==4 && $this->data[$this->alias]['filename_magazine']['size']==0) {
		unset($this->data[$this->alias]['filename_magazine']);
	}

	parent::beforeValidate($options);
}
}