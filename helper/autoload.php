<?php

// It's too fat to use PHPUnit Autoloader for my usage.

require_once dirname(__FILE__) . "/../lib/langrid-php-library/MultiLanguageStudio.php";

spl_autoload_register(
function ($class)
{
    static $classes = NULL;
    static $path    = NULL;

    if ($classes === NULL) {
        $classes = array(
                'phpunit_framework_assert' => '/Framework/Assert.php',
                'phpunit_framework_assertionfailederror' => '/Framework/AssertionFailedError.php',
                'phpunit_framework_comparator' => '/Framework/Comparator.php',
                'phpunit_framework_comparator_array' => '/Framework/Comparator/Array.php',
                'phpunit_framework_comparator_domdocument' => '/Framework/Comparator/DOMDocument.php',
                'phpunit_framework_comparator_double' => '/Framework/Comparator/Double.php',
                'phpunit_framework_comparator_exception' => '/Framework/Comparator/Exception.php',
                'phpunit_framework_comparator_mockobject' => '/Framework/Comparator/MockObject.php',
                'phpunit_framework_comparator_numeric' => '/Framework/Comparator/Numeric.php',
                'phpunit_framework_comparator_object' => '/Framework/Comparator/Object.php',
                'phpunit_framework_comparator_resource' => '/Framework/Comparator/Resource.php',
                'phpunit_framework_comparator_scalar' => '/Framework/Comparator/Scalar.php',
                'phpunit_framework_comparator_splobjectstorage' => '/Framework/Comparator/SplObjectStorage.php',
                'phpunit_framework_comparator_type' => '/Framework/Comparator/Type.php',
                'phpunit_framework_comparatorfactory' => '/Framework/ComparatorFactory.php',
                'phpunit_framework_comparisonfailure' => '/Framework/ComparisonFailure.php',
                'phpunit_framework_constraint' => '/Framework/Constraint.php',
                'phpunit_framework_constraint_and' => '/Framework/Constraint/And.php',
                'phpunit_framework_constraint_arrayhaskey' => '/Framework/Constraint/ArrayHasKey.php',
                'phpunit_framework_constraint_attribute' => '/Framework/Constraint/Attribute.php',
                'phpunit_framework_constraint_callback' => '/Framework/Constraint/Callback.php',
                'phpunit_framework_constraint_classhasattribute' => '/Framework/Constraint/ClassHasAttribute.php',
                'phpunit_framework_constraint_classhasstaticattribute' => '/Framework/Constraint/ClassHasStaticAttribute.php',
                'phpunit_framework_constraint_composite' => '/Framework/Constraint/Composite.php',
                'phpunit_framework_constraint_count' => '/Framework/Constraint/Count.php',
                'phpunit_framework_constraint_exception' => '/Framework/Constraint/Exception.php',
                'phpunit_framework_constraint_exceptioncode' => '/Framework/Constraint/ExceptionCode.php',
                'phpunit_framework_constraint_exceptionmessage' => '/Framework/Constraint/ExceptionMessage.php',
                'phpunit_framework_constraint_fileexists' => '/Framework/Constraint/FileExists.php',
                'phpunit_framework_constraint_greaterthan' => '/Framework/Constraint/GreaterThan.php',
                'phpunit_framework_constraint_isanything' => '/Framework/Constraint/IsAnything.php',
                'phpunit_framework_constraint_isempty' => '/Framework/Constraint/IsEmpty.php',
                'phpunit_framework_constraint_isequal' => '/Framework/Constraint/IsEqual.php',
                'phpunit_framework_constraint_isfalse' => '/Framework/Constraint/IsFalse.php',
                'phpunit_framework_constraint_isidentical' => '/Framework/Constraint/IsIdentical.php',
                'phpunit_framework_constraint_isinstanceof' => '/Framework/Constraint/IsInstanceOf.php',
                'phpunit_framework_constraint_isjson' => '/Framework/Constraint/IsJson.php',
                'phpunit_framework_constraint_isnull' => '/Framework/Constraint/IsNull.php',
                'phpunit_framework_constraint_istrue' => '/Framework/Constraint/IsTrue.php',
                'phpunit_framework_constraint_istype' => '/Framework/Constraint/IsType.php',
                'phpunit_framework_constraint_jsonmatches' => '/Framework/Constraint/JsonMatches.php',
                'phpunit_framework_constraint_jsonmatches_errormessageprovider' => '/Framework/Constraint/JsonMatches/ErrorMessageProvider.php',
                'phpunit_framework_constraint_lessthan' => '/Framework/Constraint/LessThan.php',
                'phpunit_framework_constraint_not' => '/Framework/Constraint/Not.php',
                'phpunit_framework_constraint_objecthasattribute' => '/Framework/Constraint/ObjectHasAttribute.php',
                'phpunit_framework_constraint_or' => '/Framework/Constraint/Or.php',
                'phpunit_framework_constraint_pcrematch' => '/Framework/Constraint/PCREMatch.php',
                'phpunit_framework_constraint_samesize' => '/Framework/Constraint/SameSize.php',
                'phpunit_framework_constraint_stringcontains' => '/Framework/Constraint/StringContains.php',
                'phpunit_framework_constraint_stringendswith' => '/Framework/Constraint/StringEndsWith.php',
                'phpunit_framework_constraint_stringmatches' => '/Framework/Constraint/StringMatches.php',
                'phpunit_framework_constraint_stringstartswith' => '/Framework/Constraint/StringStartsWith.php',
                'phpunit_framework_constraint_traversablecontains' => '/Framework/Constraint/TraversableContains.php',
                'phpunit_framework_constraint_traversablecontainsonly' => '/Framework/Constraint/TraversableContainsOnly.php',
                'phpunit_framework_constraint_xor' => '/Framework/Constraint/Xor.php',
                'phpunit_framework_error' => '/Framework/Error.php',
                'phpunit_framework_error_deprecated' => '/Framework/Error/Deprecated.php',
                'phpunit_framework_error_notice' => '/Framework/Error/Notice.php',
                'phpunit_framework_error_warning' => '/Framework/Error/Warning.php',
                'phpunit_framework_exception' => '/Framework/Exception.php',
                'phpunit_framework_expectationfailedexception' => '/Framework/ExpectationFailedException.php',
                'phpunit_framework_incompletetest' => '/Framework/IncompleteTest.php',
                'phpunit_framework_incompletetesterror' => '/Framework/IncompleteTestError.php',
                'phpunit_framework_outputerror' => '/Framework/OutputError.php',
                'phpunit_framework_selfdescribing' => '/Framework/SelfDescribing.php',
                'phpunit_framework_skippedtest' => '/Framework/SkippedTest.php',
                'phpunit_framework_skippedtesterror' => '/Framework/SkippedTestError.php',
                'phpunit_framework_skippedtestsuiteerror' => '/Framework/SkippedTestSuiteError.php',
                'phpunit_framework_syntheticerror' => '/Framework/SyntheticError.php',
                'phpunit_framework_test' => '/Framework/Test.php',
                'phpunit_framework_testcase' => '/Framework/TestCase.php',
                'phpunit_framework_testfailure' => '/Framework/TestFailure.php',
                'phpunit_framework_testlistener' => '/Framework/TestListener.php',
                'phpunit_framework_testresult' => '/Framework/TestResult.php',
                'phpunit_framework_testsuite' => '/Framework/TestSuite.php',
                'phpunit_framework_testsuite_dataprovider' => '/Framework/TestSuite/DataProvider.php',
                'phpunit_framework_warning' => '/Framework/Warning.php',
                'phpunit_runner_basetestrunner' => '/Runner/BaseTestRunner.php',
                'phpunit_runner_standardtestsuiteloader' => '/Runner/StandardTestSuiteLoader.php',
                'phpunit_runner_testsuiteloader' => '/Runner/TestSuiteLoader.php',
                'phpunit_runner_version' => '/Runner/Version.php',
                'phpunit_util_class' => '/Util/Class.php',
                'phpunit_util_configuration' => '/Util/Configuration.php',
                'phpunit_util_deprecatedfeature' => '/Util/DeprecatedFeature.php',
                'phpunit_util_deprecatedfeature_logger' => '/Util/DeprecatedFeature/Logger.php',
                'phpunit_util_diff' => '/Util/Diff.php',
                'phpunit_util_errorhandler' => '/Util/ErrorHandler.php',
                'phpunit_util_fileloader' => '/Util/Fileloader.php',
                'phpunit_util_filesystem' => '/Util/Filesystem.php',
                'phpunit_util_filter' => '/Util/Filter.php',
                'phpunit_util_getopt' => '/Util/Getopt.php',
                'phpunit_util_globalstate' => '/Util/GlobalState.php',
                'phpunit_util_invalidargumenthelper' => '/Util/InvalidArgumentHelper.php',
                'phpunit_util_log_json' => '/Util/Log/JSON.php',
                'phpunit_util_log_junit' => '/Util/Log/JUnit.php',
                'phpunit_util_log_tap' => '/Util/Log/TAP.php',
                'phpunit_util_php' => '/Util/PHP.php',
                'phpunit_util_php_default' => '/Util/PHP/Default.php',
                'phpunit_util_php_windows' => '/Util/PHP/Windows.php',
                'phpunit_util_printer' => '/Util/Printer.php',
                'phpunit_util_string' => '/Util/String.php',
                'phpunit_util_test' => '/Util/Test.php',
                'phpunit_util_testdox_nameprettifier' => '/Util/TestDox/NamePrettifier.php',
                'phpunit_util_testdox_resultprinter' => '/Util/TestDox/ResultPrinter.php',
                'phpunit_util_testdox_resultprinter_html' => '/Util/TestDox/ResultPrinter/HTML.php',
                'phpunit_util_testdox_resultprinter_text' => '/Util/TestDox/ResultPrinter/Text.php',
                'phpunit_util_testsuiteiterator' => '/Util/TestSuiteIterator.php',
                'phpunit_util_type' => '/Util/Type.php',
                'phpunit_util_xml' => '/Util/XML.php',
                'php_timer' => '/../../php-timer/PHP/Timer.php'
        );

        $path = dirname(__FILE__) . '/../lib/phpunit/PHPUnit';
    }

    $cn = strtolower($class);

    if (isset($classes[$cn])) {
        require $path . $classes[$cn];
    }
}
);

spl_autoload_register(function ($class) {
	static $classes = NULL;
	static $path = NULL;

	if ($classes === NULL) {
	    $classes = array(
	            'dolservicetest' => '/service_test_interface/DOLServiceTest.php'
	    );

	    $path = dirname(__FILE__) . '/..';
	}

	$cn = strtolower($class);

	if (isset($classes[$cn])) {
	    require $path . $classes[$cn];
	}
});

