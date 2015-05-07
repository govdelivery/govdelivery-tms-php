TMS Client (PHP)
===========
This is a reference PHP client to interact with the GovDelivery TMS REST API.

Installation
------------
### Using Composer

```
composer require govdelivery/tms-client
```

Usage
-----
### Example

```php
use \Tms\Client;
use \Tms\Resource\Sms;

$client = new Client('{{YOURAUTHKEY}}');
$sms = new Sms($client);
$sms->build(array('body' => 'Hello. This is a test SMS.'));
$sms->recipients->build(array('phone' => '+16125551234'));
$sms->post();
```
