# Pig Latin command line application

This is a simple commmand line application, which takes a word as an argument
encrypt it to a Pig Latin word.

## Rules

1. In words that begin with consonant sounds, the initial consonant or consonant cluster is moved to the end of the word, and "ay" is added, as in the following examples: 
    - beast → east-bay
    - dough → ough-day
    - happy → appy-hay
    - question → estion-quay
    - star → ar-stay
    - three → ee-thray
2. In words that begin with vowel sounds or silent consonants, the syllable "ay" is added to the end of the word. In some dialects, to aid in pronunciation, an extra consonant is added to the beginning of the suffix; for instance, eagle could yield eagle'yay, eagle'way, or eagle'hay.
3. Transcription varies. A hyphen or apostrophe is sometimes used to facilitate translation back into English. Ayspray, for instance, is ambiguous, but ay-spray means "spray" whereas ays-pray means "prays."

## Installation

Simply clone this repo and install the dependencies with composer:

	composer install

After that, you can run the script from the folder where you installed:

	./piglatin encrypt queen

You may also encrypt a longer string instead of a single word:

	./piglatin encrypt "Lorem ipsum dolor sit amet"

![Encrypting a longer string](https://sc-cdn.scaleengine.net/i/2c438070bccf7e7ffc73e2fc8c000252.png  'Encrypting a longer string')

## Tests

I used PHPSpec to unit test the command class. If you want to run the tests just type:

	vendor/bin/phpspec run

![Running tests](https://sc-cdn.scaleengine.net/i/d26d55fe7eccf79f2d018840c9dd7209.png 'Running the tests')
