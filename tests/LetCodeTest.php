<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use src\LetCode;

class LetCodeTest extends TestCase
{
    private LetCode $le;

    public function setUp(): void
    {
        echo $this->getName();
        $this->le = new LetCode();
    }

    public function testValidAnagram()
    {
        $str1 = "anagram";
        $str2 = "nagaram";
        $r = $this->le->isAnagram($str1, $str2);
        $this->assertEquals(true, $r);

        $str1 = "rat";
        $str2 = "cat";

        $r = $this->le->isAnagram($str1, $str2);
        $this->assertEquals(false, $r);
    }

    public function testValidParentheses()
    {
        $str1 = "(])";
        $r = $this->le->validParentheses($str1);
        $this->assertEquals(false, $r);

        $str1 = "()";
        $r = $this->le->validParentheses($str1);
        $this->assertEquals(true, $r);
    }

    public function testValidPalindrome() {

        $str = "A man, a plan, a canal: Panama";
        $r = $this->le->isPalindrome($str);
        $this->assertEquals(true, $r);

        $str = "race a car";
        $r = $this->le->isPalindrome($str);
        $this->assertEquals(false, $r);
    }
}