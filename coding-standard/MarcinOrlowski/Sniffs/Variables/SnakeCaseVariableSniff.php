<?php

// @codingStandardsIgnoreFile

class MarcinOrlowski_Sniffs_Variables_SnakeCaseVariableSniff implements PHP_CodeSniffer_Sniff {
	protected static $snake_cache = [];

	public function register() {
		return [T_STRING_VARNAME, T_VARIABLE];
	}

	public function process(PHP_CodeSniffer_File $phpcs_file, $stack_ptr) {
		$tokens = $phpcs_file->getTokens();
		$var = trim($tokens[$stack_ptr]['content']);
		if ($var !== strtoupper($var) && $var != static::snake($var)) {
			$phpcs_file->addError("Variable $var is not in snake case.", $stack_ptr);
		}
	}

	//originally from Illuminate\Support\Str::snake
	public static function snake($value, $delimiter = '_') {
		$key = $value . $delimiter;

		if (isset(static::$snake_cache[$key])) {
			return static::$snake_cache[$key];
		}

		if (!ctype_lower($value)) {
			$value = strtolower(preg_replace('/(.)(?=[A-Z])/', '$1' . $delimiter, $value));
		}

		return static::$snake_cache[$key] = $value;
	}
}