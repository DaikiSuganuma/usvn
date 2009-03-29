<?php
/**
 * Tools for translation
 *
 * @author Team USVN <contact@usvn.info>
 * @link http://www.usvn.info
 * @license http://www.cecill.info/licences/Licence_CeCILL_V2-en.txt CeCILL V2
 * @copyright Copyright 2007, Team USVN
 * @since 0.5
 * @package usvn
 *
 * This software has been written at EPITECH <http://www.epitech.net>
 * EPITECH, European Institute of Technology, Paris - FRANCE -
 * This project has been realised as part of
 * end of studies project.
 *
 * $Id: TranslationTest.php 1188 2007-10-06 12:03:17Z crivis_s $
 */

// Call USVN_TranslationTest::main() if this source file is executed directly.
if (!defined("PHPUnit_MAIN_METHOD")) {
    define("PHPUnit_MAIN_METHOD", "USVN_TranslationTest::main");
}

require_once "PHPUnit/Framework/TestCase.php";
require_once "PHPUnit/Framework/TestSuite.php";

require_once 'library/USVN/autoload.php';

/**
 * Test class for USVN_Translation.
 * Generated by PHPUnit_Util_Skeleton on 2007-03-10 at 16:05:57.
 */
class USVN_TranslationTest extends PHPUnit_Framework_TestCase {
    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main() {
        require_once "PHPUnit/TextUI/TestRunner.php";

        $suite  = new PHPUnit_Framework_TestSuite("USVN_TranslationTest");
        $result = PHPUnit_TextUI_TestRunner::run($suite);
    }

    public function test_getLanguage()
    {
		USVN_Translation::initTranslation('fr_FR', 'app/locale');
		$this->assertEquals('fr_FR', USVN_Translation::getLanguage());
	}

    public function test_getLocaleDirectory()
    {
		USVN_Translation::initTranslation('fr_FR', 'app/locale');
		$this->assertEquals('app/locale', USVN_Translation::getLocaleDirectory());
	}

	public function test_translation()
    {
		USVN_Translation::initTranslation('fr_FR', 'app/locale');
		$this->assertEquals("Bienvenue sur USVN", T_("Welcome to USVN"), "Translation error.");
	}

	public function test_listTranslation()
	{
		$list = USVN_Translation::listTranslation();
		$this->assertTrue(in_array('fr_FR', $list));
		$this->assertTrue(in_array('en_US', $list));
		$this->assertFalse(in_array('.', $list));
		$this->assertFalse(in_array('..', $list));
		$this->assertFalse(in_array('.svn', $list));
	}

	public function test_isValidLanguageDirectory()
	{
		$this->assertTrue(USVN_Translation::isValidLanguageDirectory('app/locale/fr_FR'));
		$this->assertTrue(USVN_Translation::isValidLanguageDirectory('app/locale/en_US'));
		$this->assertFalse(USVN_Translation::isValidLanguageDirectory('app/locale/.svn'));
	}
}

// Call USVN_TranslationTest::main() if this source file is executed directly.
if (PHPUnit_MAIN_METHOD == "USVN_TranslationTest::main") {
    USVN_TranslationTest::main();
}
?>
