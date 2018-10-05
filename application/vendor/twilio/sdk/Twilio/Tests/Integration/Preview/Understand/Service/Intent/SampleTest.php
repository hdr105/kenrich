<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Preview\Understand\Service\Intent;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class SampleTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->understand->services("UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                              ->intents("UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                              ->samples("UFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/understand/Services/UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Intents/UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Samples/UFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "url": "https://preview.twilio.com/understand/Services/UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Intents/UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Samples/UFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "intent_sid": "UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sid": "UFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "service_sid": "UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "2015-07-30T20:00:00Z",
                "language": "language",
                "tagged_text": "tagged_text",
                "date_updated": "2015-07-30T20:00:00Z"
            }
            '
        ));

        $actual = $this->twilio->preview->understand->services("UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                    ->intents("UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                    ->samples("UFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->fetch();

        $this->assertNotNull($actual);
    }

    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->understand->services("UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                              ->intents("UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                              ->samples->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://preview.twilio.com/understand/Services/UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Intents/UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Samples'
        ));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "samples": [],
                "meta": {
                    "first_page_url": "https://preview.twilio.com/understand/Services/UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Intents/UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Samples?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "key": "samples",
                    "next_page_url": null,
                    "url": "https://preview.twilio.com/understand/Services/UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Intents/UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Samples?PageSize=50&Page=0",
                    "page": 0,
                    "page_size": 50
                }
            }
            '
        ));

        $actual = $this->twilio->preview->understand->services("UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                    ->intents("UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                    ->samples->read();

        $this->assertNotNull($actual);
    }

    public function testReadFullResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "samples": [
                    {
                        "url": "https://preview.twilio.com/understand/Services/UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Intents/UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Samples/UFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "intent_sid": "UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "sid": "UFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "service_sid": "UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "date_created": "2015-07-30T20:00:00Z",
                        "language": "language",
                        "tagged_text": "tagged_text",
                        "date_updated": "2015-07-30T20:00:00Z"
                    }
                ],
                "meta": {
                    "first_page_url": "https://preview.twilio.com/understand/Services/UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Intents/UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Samples?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "key": "samples",
                    "next_page_url": null,
                    "url": "https://preview.twilio.com/understand/Services/UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Intents/UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Samples?PageSize=50&Page=0",
                    "page": 0,
                    "page_size": 50
                }
            }
            '
        ));

        $actual = $this->twilio->preview->understand->services("UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                    ->intents("UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                    ->samples->read();

        $this->assertGreaterThan(0, count($actual));
    }

    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->understand->services("UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                              ->intents("UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                              ->samples->create("language", "taggedText");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = array('Language' => "language", 'TaggedText' => "taggedText");

        $this->assertRequest(new Request(
            'post',
            'https://preview.twilio.com/understand/Services/UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Intents/UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Samples',
            null,
            $values
        ));
    }

    public function testCreateResponse() {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "url": "https://preview.twilio.com/understand/Services/UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Intents/UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Samples/UFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "intent_sid": "UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sid": "UFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "service_sid": "UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "2015-07-30T20:00:00Z",
                "language": "language",
                "tagged_text": "tagged_text",
                "date_updated": "2015-07-30T20:00:00Z"
            }
            '
        ));

        $actual = $this->twilio->preview->understand->services("UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                    ->intents("UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                    ->samples->create("language", "taggedText");

        $this->assertNotNull($actual);
    }

    public function testUpdateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->understand->services("UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                              ->intents("UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                              ->samples("UFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'post',
            'https://preview.twilio.com/understand/Services/UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Intents/UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Samples/UFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testUpdateResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "url": "https://preview.twilio.com/understand/Services/UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Intents/UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Samples/UFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "intent_sid": "UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "sid": "UFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "service_sid": "UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "date_created": "2015-07-30T20:00:00Z",
                "language": "language",
                "tagged_text": "tagged_text",
                "date_updated": "2015-07-30T20:00:00Z"
            }
            '
        ));

        $actual = $this->twilio->preview->understand->services("UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                    ->intents("UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                    ->samples("UFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->update();

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->preview->understand->services("UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                              ->intents("UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                              ->samples("UFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://preview.twilio.com/understand/Services/UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Intents/UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Samples/UFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ));
    }

    public function testDeleteResponse() {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->preview->understand->services("UAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                    ->intents("UDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
                                                    ->samples("UFaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")->delete();

        $this->assertTrue($actual);
    }
}