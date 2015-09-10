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
### SMS Example

```php
use \Tms\Client;
use \Tms\Resource\Sms;

$client = new Client('{{YOURAUTHKEY}}');
$sms = new Sms($client);
$sms->build(array('body' => 'Hello. This is a test SMS.'));
$sms->recipients->build(array('phone' => '+16125551234'));
$sms->post();
```

### Email Example

```php
use \Tms\Client;
use \TMS\Resource\Email;


$client = new Client('{{YOURAUTHKEY}}');
$email = new Email($client);
$email->build(array(
  'subject' => 'Check this email out!',
  'body' => 'This is a really interesting email!',
  'from_name' => 'John Doe',
  'from_email' => 'john.doe@example.com',
  'click_tracking_enabled' => true,
  'open_tracking_enabled' => true,
));
$email->recipients->build(array('email' => 'jane.doe@example.com'));
$email->recipients->build(array('email' => 'john.smith@example.com'));
$email->recipients->build(array('email' => 'sally.jones@example.com'));
$email->post();
```