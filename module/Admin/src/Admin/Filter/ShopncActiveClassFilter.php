<?php
namespace Admin\Filter;

use Zend\InputFilter\InputFilter;
class ShopncActiveClassFilter extends InputFilter
{
	public function __construct()
	{
		$this->add(array(
				'name' => 'classId',
				'required' => true,
				'filters' => array(
						array('name' => 'Int')
				)
		));

		$this->add(array(
				'name' => 'className',
				'required' => true,
				'filters' => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
				),
				'validators' => array(
						array(
								'name' => 'StringLength',
								'options' => array(
										'encoding' => 'UTF-8',
										'min' => 1,
										'max' => 100,
								)
						)
				)
		));

		$this->add(array(
				'name' => 'sort',
				'required' => true,
				'filters' => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
				),
				'validators' => array(
						array(
								'name' => 'Between',
								'options' => array(
										'min' => 0,
										'max' => 255,
								)
						)
				)
		));

	}
}