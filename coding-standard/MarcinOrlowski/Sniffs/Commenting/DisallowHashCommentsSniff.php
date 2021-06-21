<?php
/**
 * This sniff prohibits the use of Perl style hash comments.
 *
 * An example of a hash comment is:
 *
 * <code>
 *  # This is a hash comment, which is prohibited.
 *  $hello = 'hello';
 * </code>
 */

namespace MarcinOrlowski\Sniffs\Commenting;

use \PHP_CodeSniffer\Sniffs\Sniff;
use \PHP_CodeSniffer\Files\File;

class DisallowHashCommentsSniff implements Sniff
{
	/**
	 * Returns the token types that this sniff is interested in.
	 *
	 * @return array(int)
	 */
	public function register()
	{
		return [T_COMMENT];
	}

	/**
	 * Processes the tokens that this sniff is interested in.
	 *
	 * @param PHP_CodeSniffer\Files\File $phpcs_file The file where the token was found.
	 * @param int                        $stack_ptr  The position in the stack where
	 *                                               the token was found.
	 *
	 * @return void
	 */
	public function process(File $phpcs_file, $stack_ptr)
	{
		$tokens = $phpcs_file->getTokens();
		if ($tokens[ $stack_ptr ]['content'][0] === '#') {
			$error = 'Hash comments are prohibited; found %s';
			$data = [trim($tokens[ $stack_ptr ]['content'])];
			$phpcs_file->addError($error, $stack_ptr, 'Found', $data);
		}
	}
}
