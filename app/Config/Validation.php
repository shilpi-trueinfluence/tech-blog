<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];
        
//        public $createuser = [
//            'first_name'        => 'required',
//            'last_name'         => 'required',
//            'phone'             => 'required',
//            'email_id'          => 'required|valid_email',
//            'password'          => 'required',
//            'confirm_password'  => 'required|matches[password]',
//        ];
//        
//        public $createuser_errors = [
//            'first_name' => [
//                'required' => 'First Name is required.',
//            ],'last_name' => [
//                'required' => 'Last Name is required.'
//            ],'email_id' => [
//                'required' => 'Email ID is required.',
//            ],'phone' => [
//                'required' => 'Contact Number is required.'
//            ],'password' => [
//                'required' => 'Password is required.',
//            ],'confirm_password' => [
//                'required' => 'Confirm Password is required.'
//            ]
//        ];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
