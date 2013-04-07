<?php
  /**
	 * The Caverphone is a phonetic algorithm (an algorithm to index words by their pronounciations) developed to
	 * assist in data matching between late 19th century and early 20th century electoral rolls, optimized for
	 * accents present in parts of New Zealand.
	 *
	 * The algorithm is used to determine if words sound alike. If two words have the same Caverphone code, they are
	 * thought to rhyme with each other.
	 *
	 * @author	Kip Hughes < kiphughes@gmail.com >
	 * @param	string	$word	The word to be converted into Caverphone code
	 * @return	string		The Caverphone code for the input word
	 * @see	http://caversham.otago.ac.nz/files/working/ctp150804.pdf
	 */
	function get_caverphone_code($word)
	{
		// Convert to lowercase
		$word = strtolower($word);

		// Remove anything not in the standard alphabet (typically a-z)
		// NOTE: This may vary if the set of letters includes characters such as æ, ā, or ø
		$word = preg_replace('/[^a-z]/', '', $word);

		// Remove "ﬁnal e"
		$word = preg_replace('/e$/', '', $word);

		// If the word "starts with cough", make it "cou2f"
		$word = preg_replace('/^cough/', 'cou2f', $word);

		// If the word "starts with rough", make it "rou2f"
		$word = preg_replace('/^rough/', 'rou2f', $word);

		// If the word "starts with tough", make it "tou2f"
		$word = preg_replace('/^tough/', 'tou2f', $word);

		// If the word "starts with enough", make it "enou2f"
		$word = preg_replace('/^enough/', 'enou2f', $word);

		// If the word "starts with trough", make it "trou2f"
		$word = preg_replace('/^trough/', 'trou2f', $word);

		// If the word "starts with gn", make it "2n"
		$word = preg_replace('/^gn/', '2n', $word);

		// If the word "ends with mb", make it "m2"
		$word = preg_replace('/mb$/', 'm2', $word);

		// Replace "cq" with "2q"
		$word = str_replace('cq', '2q', $word);

		// Replace "ci" with "si"
		$word = str_replace('ci', 'si', $word);

		// Replace "ce" with "se"
		$word = str_replace('ce', 'se', $word);

		// Replace "cy" with "sy"
		$word = str_replace('cy', 'sy', $word);

		// Replace "tch" with "2ch"
		$word = str_replace('tch', '2ch', $word);

		// Replace "c" with "k"
		$word = str_replace('c', 'k', $word);

		// Replace "q" with "k"
		$word = str_replace('q', 'k', $word);

		// Replace "x" with "k"
		$word = str_replace('x', 'k', $word);

		// Replace "v" with "f"
		$word = str_replace('v', 'f', $word);

		// Replace "dg" with "2g"
		$word = str_replace('dg', '2g', $word);

		// Replace "tio" with "sio"
		$word = str_replace('tio', 'sio', $word);

		// Replace "tia" with "sia"
		$word = str_replace('tia', 'sia', $word);

		// Replace "d" with "t"
		$word = str_replace('d', 't', $word);

		// Replace "ph" with "fh"
		$word = str_replace('ph', 'fh', $word);

		// Replace "b" with "p"
		$word = str_replace('b', 'p', $word);

		// Replace "sh" with "s2"
		$word = str_replace('sh', 's2', $word);

		// Replace "z" with "s"
		$word = str_replace('z', 's', $word);

		// Replace an "initial vowel" with an "A"
		// NOTE: Vowels are normally a,e,i,o,u but depending on the data might include characters such as æ, ā, or ø
		$word = preg_replace('/^[aeiou]/', 'A', $word);

		// Replace "all other vowels" with a "3"
		$word = preg_replace('/[aeiou]/', '3', $word);

		// Replace "j" with "y"
		$word = str_replace('j', 'y', $word);

		// Replace an "initial y3" with "Y3"
		$word = preg_replace('/^y3/', 'Y3', $word);

		// Replace an "initial y" with "A"
		$word = preg_replace('/^y/', 'A', $word);

		// Replace "y" with "3"
		$word = str_replace('y', '3', $word);

		// Replace "3gh3" with "3kh3"
		$word = str_replace('3gh3', '3kh3', $word);

		// Replace "gh" with "22"
		$word = str_replace('gh', '22', $word);

		// Replace "g" with "k"
		$word = str_replace('g', 'k', $word);

		// Replace "groups of the letter s" with a "S"
		$word = preg_replace('/s{1,}/', 'S', $word);

		// Replace "groups of the letter t" with a "T"
		$word = preg_replace('/t{1,}/', 'T', $word);

		// Replace "groups of the letter p" with a "P"
		$word = preg_replace('/p{1,}/', 'P', $word);

		// Replace "groups of the letter k" with a "K"
		$word = preg_replace('/k{1,}/', 'K', $word);

		// Replace "groups of the letter f" with a "F"
		$word = preg_replace('/f{1,}/', 'F', $word);

		// Replace "groups of the letter m" with a "M"
		$word = preg_replace('/m{1,}/', 'M', $word);

		// Replace "groups of the letter n" with a "N"
		$word = preg_replace('/n{1,}/', 'N', $word);

		// Replace "w3" with "W3"
		$word = str_replace('w3', 'W3', $word);

		// Replace "wh3" with "Wh3"
		$word = str_replace('wh3', 'Wh3', $word);

		// If the word "ends in w", replace the "ﬁnal w" with "3"
		$word = preg_replace('/w$/', '3', $word);

		// Replace "w" with "2"
		$word = str_replace('w', '2', $word);

		// Replace an "initial h" with an "A"
		$word = preg_replace('/^h/', 'A', $word);

		// Replace "all other occurrences of h" with a "2"
		$word = preg_replace('/h/', '2', $word);

		// Replace "r3" with "R3"
		$word = str_replace('r3', 'R3', $word);

		// If the word "ends in r", replace the replace "ﬁnal r" with "3"
		$word = preg_replace('/r$/', '3', $word);

		// Replace "r" with "2"
		$word = str_replace('r', '2', $word);

		// Replace "l3" with "L3"
		$word = str_replace('l3', 'L3', $word);

		// If the word "ends in l", replace the replace "ﬁnal l" with "3"
		$word = preg_replace('/l$/', '3', $word);

		// Replace "l" with "2"
		$word = str_replace('l', '2', $word);

		// Remove all "2"s
		$word = str_replace('2', '', $word);

		// If the word "ends in 3", replace the "ﬁnal 3" with "A"
		$word = preg_replace('/3$/', 'A', $word);

		// Remove all "3"s
		$word = str_replace('3', '', $word);

		// Put ten "1"s on the end
		$word = str_pad($word, 10, '1');

		// Take the first ten characters as the code
		$word = substr($word, 0, 10);

		return $word;
	}
