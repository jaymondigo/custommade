<?php
/**
 *	@package	SimpleTest
 *	@subpackage	Extensions
 *	@version	$Id: selenese_tester.php 1802 2008-09-08 10:43:58Z maetl_ $
 */

/**#@+
 * include SimpleTest files
 */
require_once dirname(__FILE__).'/../unit_tester.php';
require_once dirname(__FILE__).'/selenium/remote-control.php';
/**#@-*/

/**
 * SeleneseTestCase
 * 
 * Integrate selenese html test suite support (can be generated by selenium-IDE)
 * 
 * @category Testing
 * @package SimpleTest
 * @subpackage Extensions
 * @author Guidet Alexandre <alwex@free.fr>
 * @param simpleSelenium $selenium
 * @param string $html
 * @param  string $testFile
 * @param array $parsed_table
 * @param string $logMessages
 * @param array $_commandMap
 * 
 */
class SeleneseTestCase extends UnitTestCase {
	var $selenium;
	var $html;
	var $testFile;
	var $parsed_table;
	var $logMessages;
	var $_commandMap = array("verify",
							"verifyErrorOnNext",
							"verifyNotErrorOnNext",
							"verifyFailureOnNext",
							"verifyNotFailureOnNext",
							"verifySelected",
							"verifyNotSelected",
							"verifyAlert",
							"verifyNotAlert",
							"verifyAllButtons",
							"verifyNotAllButtons",
							"verifyAllFields",
							"verifyNotAllFields",
							"verifyAllLinks",
							"verifyNotAllLinks",
							"verifyAllWindowIds",
							"verifyNotAllWindowIds",
							"verifyAllWindowNames",
							"verifyNotAllWindowNames",
							"verifyAllWindowTitles",
							"verifyNotAllWindowTitles",
							"verifyAttribute",
							"verifyNotAttribute",
							"verifyAttributeFromAllWindows",
							"verifyNotAttributeFromAllWindows",
							"verifyBodyText",
							"verifyNotBodyText",
							"verifyConfirmation",
							"verifyNotConfirmation",
							"verifyCookie",
							"verifyNotCookie",
							"verifyCursorPosition",
							"verifyNotCursorPosition",
							"verifyElementHeight",
							"verifyNotElementHeight",
							"verifyElementIndex",
							"verifyNotElementIndex",
							"verifyElementPositionLeft",
							"verifyNotElementPositionLeft",
							"verifyElementPositionTop",
							"verifyNotElementPositionTop",
							"verifyElementWidth",
							"verifyNotElementWidth",
							"verifyEval",
							"verifyNotEval",
							"verifyExpression",
							"verifyNotExpression",
							"verifyHtmlSource",
							"verifyNotHtmlSource",
							"verifyLocation",
							"verifyNotLocation",
							"verifyLogMessages",
							"verifyNotLogMessages",
							"verifyMouseSpeed",
							"verifyNotMouseSpeed",
							"verifyPrompt",
							"verifyNotPrompt",
							"verifySelectedId",
							"verifyNotSelectedId",
							"verifySelectedIds",
							"verifyNotSelectedIds",
							"verifySelectedIndex",
							"verifyNotSelectedIndex",
							"verifySelectedIndexes",
							"verifyNotSelectedIndexes",
							"verifySelectedLabel",
							"verifyNotSelectedLabel",
							"verifySelectedLabels",
							"verifyNotSelectedLabels",
							"verifySelectedValue",
							"verifyNotSelectedValue",
							"verifySelectedValues",
							"verifyNotSelectedValues",
							"verifySelectOptions",
							"verifyNotSelectOptions",
							"verifyTable",
							"verifyNotTable",
							"verifyText",
							"verifyNotText",
							"verifyTitle",
							"verifyNotTitle",
							"verifyValue",
							"verifyNotValue",
							"verifyWhetherThisFrameMatchFrameExpression",
							"verifyNotWhetherThisFrameMatchFrameExpression",
							"verifyWhetherThisWindowMatchWindowExpression",
							"verifyNotWhetherThisWindowMatchWindowExpression",
							"verifyAlertPresent",
							"verifyAlertNotPresent",
							"verifyChecked",
							"verifyNotChecked",
							"verifyConfirmationPresent",
							"verifyConfirmationNotPresent",
							"verifyEditable",
							"verifyNotEditable",
							"verifyElementPresent",
							"verifyElementNotPresent",
							"verifyOrdered",
							"verifyNotOrdered",
							"verifyPromptPresent",
							"verifyPromptNotPresent",
							"verifySomethingSelected",
							"verifyNotSomethingSelected",
							"verifyTextPresent",
							"verifyTextNotPresent",
							"verifyVisible",
							"verifyNotVisible",
							"assert",
							"assertErrorOnNext",
							"assertNotErrorOnNext",
							"assertFailureOnNext",
							"assertNotFailureOnNext",
							"assertSelected",
							"assertNotSelected",
							"assertAlert",
							"assertNotAlert",
							"assertAllButtons",
							"assertNotAllButtons",
							"assertAllFields",
							"assertNotAllFields",
							"assertAllLinks",
							"assertNotAllLinks",
							"assertAllWindowIds",
							"assertNotAllWindowIds",
							"assertAllWindowNames",
							"assertNotAllWindowNames",
							"assertAllWindowTitles",
							"assertNotAllWindowTitles",
							"assertAttribute",
							"assertNotAttribute",
							"assertAttributeFromAllWindows",
							"assertNotAttributeFromAllWindows",
							"assertBodyText",
							"assertNotBodyText",
							"assertConfirmation",
							"assertNotConfirmation",
							"assertCookie",
							"assertNotCookie",
							"assertCursorPosition",
							"assertNotCursorPosition",
							"assertElementHeight",
							"assertNotElementHeight",
							"assertElementIndex",
							"assertNotElementIndex",
							"assertElementPositionLeft",
							"assertNotElementPositionLeft",
							"assertElementPositionTop",
							"assertNotElementPositionTop",
							"assertElementWidth",
							"assertNotElementWidth",
							"assertEval",
							"assertNotEval",
							"assertExpression",
							"assertNotExpression",
							"assertHtmlSource",
							"assertNotHtmlSource",
							"assertLocation",
							"assertNotLocation",
							"assertLogMessages",
							"assertNotLogMessages",
							"assertMouseSpeed",
							"assertNotMouseSpeed",
							"assertPrompt",
							"assertNotPrompt",
							"assertSelectedId",
							"assertNotSelectedId",
							"assertSelectedIds",
							"assertNotSelectedIds",
							"assertSelectedIndex",
							"assertNotSelectedIndex",
							"assertSelectedIndexes",
							"assertNotSelectedIndexes",
							"assertSelectedLabel",
							"assertNotSelectedLabel",
							"assertSelectedLabels",
							"assertNotSelectedLabels",
							"assertSelectedValue",
							"assertNotSelectedValue",
							"assertSelectedValues",
							"assertNotSelectedValues",
							"assertSelectOptions",
							"assertNotSelectOptions",
							"assertTable",
							"assertNotTable",
							"assertText",
							"assertNotText",
							"assertTitle",
							"assertNotTitle",
							"assertValue",
							"assertNotValue",
							"assertWhetherThisFrameMatchFrameExpression",
							"assertNotWhetherThisFrameMatchFrameExpression",
							"assertWhetherThisWindowMatchWindowExpression",
							"assertNotWhetherThisWindowMatchWindowExpression",
							"assertAlertPresent",
							"assertAlertNotPresent",
							"assertChecked",
							"assertNotChecked",
							"assertConfirmationPresent",
							"assertConfirmationNotPresent",
							"assertEditable",
							"assertNotEditable",
							"assertElementPresent",
							"assertElementNotPresent",
							"assertOrdered",
							"assertNotOrdered",
							"assertPromptPresent",
							"assertPromptNotPresent",
							"assertSomethingSelected",
							"assertNotSomethingSelected",
							"assertTextPresent",
							"assertTextNotPresent",
							"assertVisible",
							"assertNotVisible");
	
	/**
	 * constructor
	 * 
	 * Construct the object with the specified browser and url
	 * 
	 * @param string $browser
	 * @param string $url
	 */
	function __construct($browser, $url) {
		$this->selenium = new SimpleSeleniumRemoteControl($browser, $url);
		$this->parsed_table = array();
	}
	
	/**
	 * tidy
	 * 
	 * Reformat the selenium-IDE html test suites
	 */
	function tidy() {
		$tmp = $this->html;
		preg_match('/<meta.*>/', $tmp, $matche);	
		$matche[0] = str_replace("/>", ">", $matche[0]);
		$matche[0] = str_replace(">", "/>", $matche[0]);
		$tmp = preg_replace('/<meta.*>/', $matche[0], $tmp);
		$this->html = $tmp;
	}

	/**
	 * parse
	 * 
	 * Extract the called selenium fonction from the html suite
	 */
	function parse() {
		$parsedTab = array();
		$key1 = 0;
	
		$contenthtml = new DOMDocument;
		@$contenthtml->loadHtml($this->html);
		$content = simplexml_import_dom($contenthtml);
		foreach ($content->body->table->tbody->tr as $tr){
			$key2 = 0;
			foreach ($tr->td as $td){
				$parsedTab[$key1][$key2] = $td;
				$key2++;
			}
			$key1++;
		}

		$this->parsed_table = $parsedTab;
	}

	/**
	 * assertFunction
	 * 
	 * Integrate selenium fonctions in simpletest
	 * 
	 * @param string $function
	 * @param string $param1
	 * @param string $param2
	 * 
	 */
	function assertFunction($function, $param1, $param2) {
		$_verifyMap = array('verify', 'verifyTextPresent', 'verifyTextNotPresent', 'verifyValue');
		
		$reponse = $this->selenium->__call($function, array($param1, $param2));
		
		$message = $reponse;
		$message .= " using command '".$function ."' with target '".$param1."'";
		if (!empty($param2)) {
			$message .= " and value '".$param2."'";
		}
		$message .= " in file '".$this->testFile."'";

		if (!in_array($function, $_verifyMap)) {
			$reponse = substr($reponse, 0, 2) == 'OK' ? true : false;
		}
		
		$this->assertTrue($reponse, $message);
	}

	/**
	 * launch
	 * 
	 * Launch the html test suite from a PHP variable on the url declared wihle 
	 * constructing the object. The filename is used to localize the error.
	 * 
	 * @param string $testFile
	 * @param string $filename
	 * 
	 */
	function launch($html="") {
		$this->html = $html;
		$this->tidy();
		$this->parse();
		
		$this->selenium->start();
		foreach ($this->parsed_table as $test) {	
			if (in_array($test[0], $this->_commandMap)) {
				$this->assertFunction($test[0], $test[1], $test[2]);
			} else {		
				$this->selenium->__call($test[0], array($test[1], $test[2]));
			}
		}
		$this->selenium->stop();
	}
    
	/**
	 * launchPhpFile
	 * 
	 * Parse the PHP file then launch the computed test suite
	 * 
	 * @param string $file
	 * 
	 */
    function launchPhpFile($file) {
        ob_start();
        require($file);
        $data = ob_get_contents();
        ob_end_clean();
        
        $this->testFile = $file;
        $this->html = $data;
        $this->launch($this->html);
    }
    
	/**
	 * launchFile
	 * 
	 * Launch the html test suite file on the url declared wihle constructing the object
	 * 
	 * @param string $testFile
	 * 
	 */
	function launchFile($testFile) {
		$this->testFile = $testFile; 
		$this->html = file_get_contents($testFile);
		$this->launch($this->html);
	}
}

?>
