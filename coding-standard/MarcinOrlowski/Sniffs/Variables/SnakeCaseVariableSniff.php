<?php

namespace MarcinOrlowski\Sniffs\Commenting;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class SnakeCaseVariableSniff implements Sniff
{
	/** @var array */
	protected static $snake_cache = [];

	public function register()
	{
		return [
			T_STRING_VARNAME,
			T_VARIABLE,
		];
	}

	public function process(File $phpcs_file, $stack_ptr)
	{
		$tokens = $phpcs_file->getTokens();
		$var = trim($tokens[ $stack_ptr ]['content']);
		if ($var !== strtoupper($var) && $var != static::snake($var)) {
			$error = "Variable {$var} is not in snake case.";
			$data = [trim($tokens[ $stack_ptr ]['content'])];
			$phpcs_file->addError($error, $stack_ptr, 'Found', $data);
		}
	}

	//originally from Illuminate\Support\Str::snake
	public static function snake($value, $delimiter = '_')
	{
		$key = $value . $delimiter;

		if (isset(static::$snake_cache[ $key ])) {
			return static::$snake_cache[ $key ];
		}

		if (!ctype_lower($value)) {
			$value = strtolower(preg_replace('/(.)(?=[A-Z])/', '$1' . $delimiter, $value));
		}

		static::$snake_cache[ $key ] = $value;

		return $value;
	}
}
