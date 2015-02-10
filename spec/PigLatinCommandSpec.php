<?php

namespace spec\Smartbit;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PigLatinCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Smartbit\PigLatinCommand');
    }

    function it_encrypts_the_words_with_initial_consonant()
    {
        $this->encrypt('banana')->shouldBe('anana-bay');
        $this->encrypt('beast')->shouldBe('east-bay');
        $this->encrypt('dough')->shouldBe('ough-day');
        $this->encrypt('happy')->shouldBe('appy-hay');
        $this->encrypt('question')->shouldBe('estion-quay');
        $this->encrypt('star')->shouldBe('ar-stay');
        $this->encrypt('three')->shouldBe('ee-thray');
    }

    function it_encrypts_the_words_with_initial_vowel()
    {
        $this->encrypt('apple')->shouldBe('apple-way');
        $this->encrypt('eagle')->shouldBe('eagle-way');
    }

    function it_encrypts_a_sentence()
    {
        $this->encrypt('The quick brown fox jumps over the lazy dog')
            ->shouldBe('e-thay ick-quay own-bray ox-fay umps-jay over-way e-thay azy-lay og-day');
        $this->encrypt('Lorem ipsum dolor sit amet')
            ->shouldBe('orem-lay ipsum-way olor-day it-say amet-way');
    }

}
