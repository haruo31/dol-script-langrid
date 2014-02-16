<?php

class LangridJServerJaEnTest extends PHPUnit_Framework_TestCase {
	var $setting;

	// It means this test must complete within 3 seconds.
	var $responseTimeLimit = 3000;
	
	public function setUp() {
		$this->setting = json_decode(file_get_contents(dirname(__FILE__) . '/../config/langrid.json'));
	}
	
	private function buildService($client) {
		$client->setUserId($this->setting->user);
		$client->setPassword($this->setting->password);
		if ($this->setting->proxyHost) {
			$client->setProxy($this->setting->proxyHost, $this->setting->proxyPort);
		}
	}
	
	public function testTranslation() {
   		$text = 'こんにちは。私は今日は百万遍に来ています。';
		
		$client = ClientFactory::createTranslationClient($this->setting->url . 'kyoto1.langrid:KyotoUJServer');
		$this->buildService($client);
		$result = $client->translate(Language::get('ja'), Language::get('en'), $text);
		$this->assertEquals('Hello. I am in one million times.', $result);
	}
}
