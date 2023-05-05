**Motion PHP** is a community maintained PHP API Client for interacting with [Motion API](https://docs.usemotion.com/docs/motion-rest-api/44e37c461ba67-motion-rest-api). Motion is an excellent calendar and project management application which uses AI to reschedule your time effectively. If you haven't heard of it yet, check it out at [usemotion.com](https://www.usemotion.com/).

## Table of Contents
- [Getting Started](#getting-started)
- [Usage](#usage)
  - [Users Resource](#users-resource)
  


## Getting Started
> **Requires [PHP 8.1+](https://php.net/releases/)**
> 
> **Requires [PSR-18 HTTP Client](https://packagist.org/providers/psr/http-client-implementation)**

Install the Motion PHP client using the [Composer](https://getcomposer.org/) package manager:

```bash
composer require motion-php/client
```

Make sure the `php-http/discovery` composer plugin is allowed to run or install a PSR-18 HTTP Client implementation manually if your project does not already have one.

```bash
composer require guzzlehttp/guzzle
```

Then you are ready to interact with the Motion API.

```php
$apiKey = getenv('YOUR_API_KEY');

$client = Motion::client($apiKey);

$result = $client->task()->create([
    'name' => 'My Task',
    'description' => 'My Task Description',
    'status' => 'Completed',
]);

echo $result['task']['name']; // My Task
echo $result['task']['description']; // My Task Description
echo $result['task']['status']; // Completed
```

It is possible if you require to configure and provide a separate HTTP client

```php
$apiKey = getenv('YOUR_API_KEY');

// PSR-18 HTTP Client
$httpClient = new GuzzleHttp\Client([]);

$client = Motion::factory()
    ->withApiKey($apiKey)
    ->withBaseUri('api.usemotion.com')
    ->withHttpClient($httpClient)
    ->withHttpHeader('X-My-Header', 'foo')
    ->withQueryParam('foo', 'bar')
    ->withStreamHandler(fn (RequestInterface $request): ResponseInterface => $client->send($request, [
        'stream' => true
    ]))
    ->make();

```

## Usage

### `Users` Resource

#### `list`

Lists the currently available users. Can be limited by `teamId` or `workspaceId`.

```php
$response = $client->users()->list();

$response->users; // array of User objects

foreach ($response->users as $user) {
    $user->id; // LPSIBmTN2eai9uYoKtMkzWVFTUo2
    $user->name; // Adam Paterson
    $user->email; // adam@usemotion.com
}

$response->toArray(); // ['users' => [...]]
```