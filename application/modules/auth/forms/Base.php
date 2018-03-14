<?php


/**
 * Class Auth_Form_TextDecorator
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_TextDecorator extends Zend_Form_Decorator_Abstract {
  
  protected static $_errors = [
    'isEmpty'                   => 'Ce champs est obligatoire',
    'notAlpha'                  => 'Ce champs ne doit contenir que des caractères alphabétiques',
    'notAlnum'                  => 'Ce champs ne doit contenir que des chiffres',
    'emailAddressInvalidFormat' => 'Cette adresse email n\'est pas valide',
    'stringLengthTooLong'       => '%s est trop long',
    'stringLengthTooShort'      => '%s est trop court',
    'regexNotMatch'             => 'Ce champs n\'est pas valide',
    'notSame'                   => 'Les mot de passes ne sont pas identiques',
    'notInt'                    => "Ce champs ne doit contenir qu'un nombre entier",
  ];
  
  
  protected function _getError() {
    
    $keys = $this->_elm->getErrors();
    
    
    foreach ( $keys as $key ) {
      if ( array_key_exists( $key, self::$_errors ) ) {
        return sprintf( self::$_errors[ $key ], $this->_elm->getLabel() );
      }
    }
    
    
    return null;
  }
  
  
  protected function _getAttribs() {
    
    $attribs = '';
    foreach ( $this->_elm->getAttribs() as $key => $val ) {
      if ( $key !== 'class' && ( is_string( $val ) || is_int( $val ) ) ) {
        $attribs .= "{$key}=\"{$val}\" ";
      }
    }
    
    return $attribs;
  }
  
  
  protected $_elm, $_name, $_id, $_label, $_class, $_attribs, $_value, $_error, $_options;
  
  
  public function init() {
    
    $this->_elm     = $this->getElement();
    $this->_name    = $this->_elm->getFullyQualifiedName();
    $this->_id      = $this->_elm->getId();
    $this->_label   = $this->_elm->getLabel();
    $this->_class   = $this->_elm->getAttrib( 'class' );
    $this->_attribs = $this->_getAttribs();
    $this->_value   = $this->_elm->getValue();
    $this->_error   = $this->_getError();
  }
  
  
  public function render( $content ) {
    
    $this->init();
    
    $has_error = $this->_error ? 'has-error' : '';
    $required  = $this->getElement()->isRequired() ? 'required' : '';
    $type      = $this->getElement()->getType() === 'Zend_Form_Element_Text' ? 'text' : 'password';
    
    return <<<EOD
<div class="form-group {$has_error}">
	<label for="{$this->_id}">{$this->_label}</label>
	<input {$this->_attribs}
		id="{$this->_id}"
		name="{$this->_name}"
		class="form-control {$this->_class}"
		{$required}
		type="{$type}"
		placeholder="{$this->_label}"
		value="{$this->_value}">
	<span class="help-block">{$this->_error}</span>
</div>
EOD;
  }
}


/**
 * Class Auth_Form_SelectDecorator
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_SelectDecorator extends Auth_Form_TextDecorator {
  
  private function _slugify( $string, $replace = [], $delimiter = '-' ) {
    
    // https://github.com/phalcon/incubator/blob/master/Library/Phalcon/Utils/Slug.php
    if ( ! extension_loaded( 'iconv' ) ) {
      throw new Exception( 'iconv module not loaded' );
    }
    // Save the old locale and set the new locale to UTF-8
    $oldLocale = setlocale( LC_ALL, '0' );
    setlocale( LC_ALL, 'en_US.UTF-8' );
    $clean = iconv( 'UTF-8', 'ASCII//TRANSLIT', $string );
    if ( ! empty( $replace ) ) {
      $clean = str_replace( (array) $replace, ' ', $clean );
    }
    $clean = preg_replace( "/[^a-zA-Z0-9\/_|+ -]/", '', $clean );
    $clean = strtolower( $clean );
    $clean = preg_replace( "/[\/_|+ -]+/", $delimiter, $clean );
    $clean = trim( $clean, $delimiter );
    // Revert back to the old locale
    setlocale( LC_ALL, $oldLocale );
    
    return $clean;
  }
  
  
  public function render( $content ) {
    
    parent::init();
    
    $this->_options = $this->_elm->getMultiOptions();
    
    $options     = '';
    $has_error   = $this->_error ? 'has-error' : '';
    $wantSlugify = $this->_elm->getAttrib( 'slugify' ) === true;
    
    foreach ( $this->_options as $key => $val ) {
      $options .= "<option data-value=\"{$this->_slugify($val)}\" value=\"{$key}\" " . ( $this->_value == $key ? 'selected' : '' ) . ">{$val}</option>";
    }
    
    
    return <<<EOD
<div class="form-group {$has_error}">
	<label for="{$this->_id}">{$this->_label}</label>
		<select {$this->_attribs} class="form-control {$this->_class}" id="{$this->_id}" name="{$this->_name}" placeholder="{$this->_label}">
			{$options}
		</select>
	<span class="help-block">{$this->_error}</span>
</div>
EOD;
  
  }
}


/**
 * Class Auth_Form_FileDecorator
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_FileDecorator extends Auth_Form_TextDecorator {
  
  
  public function render( $content ) {
    
    parent::init();
    
    $has_error = $this->_error ? 'has-error' : '';
    
    
    return <<<EOD
<div class="form-group {$has_error}">
	<label for="{$this->_id}">{$this->_label}</label>
	<input type="file" class="form-control {$this->_class}" id="{$this->_id}" name="{$this->_name}" placeholder="{$this->_label}">
	<span class="help-block">{$this->_error}</span>
</div>
EOD;
  
  }
}


/**
 * Class Auth_Form_ButtonDecorator
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_ButtonDecorator extends Auth_Form_TextDecorator {
  
  public function render( $content ) {
    
    parent::init();
    
    $options = '';
    
    return <<<EOD
<div class="form-group">
	<button {$this->_attribs} type="{$this->_elm->getAttrib( 'type' )}" name="{$this->_name}" id="{$this->_id}" class="{$this->_class}">{$this->_label}</button>
</div>
EOD;
  
  }
}


/**
 * Class Auth_Form_TextariaDecorator
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_TextariaDecorator extends Auth_Form_TextDecorator {
  
  
  public function render( $content ) {
    
    parent::init();
    
    $has_error = $this->_error ? 'has-error' : '';
    
    return <<<EOD
<div class="form-group {$has_error}">
	<label for="{$this->_id}">{$this->_label}</label>
	<textarea {$this->_attribs} class="form-control {$this->_class}" id="{$this->_id}" name="{$this->_name}" placeholder="{$this->_label}">{$this->_value}</textarea>
	<span class="help-block">{$this->_error}</span>
</div>
EOD;
  }
}


/**
 * Class Auth_Form_Base
 *
 * @author  Youssef Erratbi <yerratbi@gmail.com>
 * @date    23/12/17
 */
class Auth_Form_Base extends Zend_Form {
  
  public static function slugify( $string, $replace = [], $delimiter = '-' ) {
    
    // https://github.com/phalcon/incubator/blob/master/Library/Phalcon/Utils/Slug.php
    if ( ! extension_loaded( 'iconv' ) ) {
      throw new Exception( 'iconv module not loaded' );
    }
    // Save the old locale and set the new locale to UTF-8
    $oldLocale = setlocale( LC_ALL, '0' );
    setlocale( LC_ALL, 'en_US.UTF-8' );
    $clean = iconv( 'UTF-8', 'ASCII//TRANSLIT', $string );
    if ( ! empty( $replace ) ) {
      $clean = str_replace( (array) $replace, ' ', $clean );
    }
    $clean = preg_replace( "/[^a-zA-Z0-9\/_|+ -]/", '', $clean );
    $clean = strtolower( $clean );
    $clean = preg_replace( "/[\/_|+ -]+/", $delimiter, $clean );
    $clean = trim( $clean, $delimiter );
    // Revert back to the old locale
    setlocale( LC_ALL, $oldLocale );
    
    return $clean;
  }
  
  
  public function init() {
    
    parent::init();
    
    $this->setDecorators( [
      'FormElements',
      [ 'HtmlTag', [ 'tag' => 'div', 'class' => 'form-wrap' ] ],
      'Form',
    ] );
    
    foreach ( $this->getElements() as $el ) {
      switch ( $el->getType() ) {
        case 'Zend_Form_Element_Text':
          $el->setDecorators( [ new Auth_Form_TextDecorator ] );
          break;
        
        case 'Zend_Form_Element_File':
          $el->setDecorators( [
            'File',
            'Errors',
            [ [ 'data' => 'HtmlTag' ], [ 'tag' => 'div' ] ],
            [
              'Label' => [ 'tag' => 'label' ],
            ],
          ] );
          break;
        
        case 'Zend_Form_Element_Password':
          $el->setDecorators( [ new Auth_Form_TextDecorator ] );
          break;
        
        case 'Zend_Form_Element_Textarea':
          $el->setDecorators( [ new Auth_Form_TextariaDecorator ] );
          break;
        
        case 'Zend_Form_Element_Select':
          $el->setDecorators( [ new Auth_Form_SelectDecorator ] );
          break;
        
        case 'Zend_Form_Element_Reset':
        case 'Zend_Form_Element_Submit':
        case 'Zend_Form_Element_Button':
          $el->setDecorators( [ new Auth_Form_ButtonDecorator ] );
          break;
      }
    }
  }
}
