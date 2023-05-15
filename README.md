**Motion PHP** is a community maintained PHP API Client for interacting with [Motion API](https://docs.usemotion.com/docs/motion-rest-api/44e37c461ba67-motion-rest-api). Motion is an excellent calendar and project management application which uses AI to reschedule your time effectively. If you haven't heard of it yet, check it out at [usemotion.com](https://www.usemotion.com/).

<p align="center">
  <img src="https://raw.githubusercontent.com/motion-php/assets/main/img/example.png" width="600" alt="Motion PHP Example"/>
    <p align="center">
      <a href="https://github.com/motion-php/client/actions"><img alt="GitHub Workflow Status (main)" src="https://img.shields.io/github/actions/workflow/status/motion-php/client/tests.yml?branch=main&style=for-the-badge"></a>
      <a href="https://packagist.org/packages/motion-php/client"><img alt="Packagist Version (including pre-releases)" src="https://img.shields.io/packagist/v/motion-php/client?include_prereleases&style=for-the-badge"></a>
      <a href="https://packagist.org/packages/motion-php/client"><img alt="Packagist Downloads" src="https://img.shields.io/packagist/dm/motion-php/client?style=for-the-badge"></a>
      <a href="https://packagist.org/packages/motion-php/client"><img alt="GitHub" src="https://img.shields.io/github/license/motion-php/client?style=for-the-badge"></a>
    </p>
</p>

## Table of Contents
- [Getting Started](#getting-started)
- [Usage](#usage)
  - [Users Resource](#users-resource)
  - [Workspaces Resource](#workspaces-resource)
  - [Tasks Resource](#tasks-resource)
  


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

### `Tasks` resource

#### `update` a task
```php
$response = $client->tasks()->update('IF0lK9JcsdaxeLkDZ0nMG', [
    'name' => 'My Task',
    'description' => 'My Task Description',
    'status' => 'Completed',
]);

$task = $response->task; // Task object

$task->id; // IF0lK9JcsdaxeLkDZ0nMG
$task->name; // My Task
$task->description; // My Task Description
$task->project; // Project object

$task->toArray(); // ['id' => 'IF0lK9JcsdaxeLkDZ0nMG', ...]
```

#### `create` a task

```php
$response = $client->tasks()->create([
    'name' => 'My Task',
    'description' => 'My Task Description',
    'status' => 'Completed',
]);

$task = $response->task; // Task object

$task->id; // IF0lK9JcsdaxeLkDZ0nMG
$task->name; // My Task
$task->description; // My Task Description
$task->project; // Project object

$task->toArray(); // ['id' => 'IF0lK9JcsdaxeLkDZ0nMG', ...]
```

#### `delete` a task

```php
$response = $client->tasks()->delete('IF0lK9JcsdaxeLkDZ0nMG');
```

#### `retrieve` a task

```php
$response = $client->tasks()->retrieve('IF0lK9JcsdaxeLkDZ0nMG');

$task = $response->task; // Task object

$task->id; // IF0lK9JcsdaxeLkDZ0nMG
$task->name; // My Task
$task->description; // My Task Description
$task->project; // Project object

$task->toArray(); // ['id' => 'IF0lK9JcsdaxeLkDZ0nMG', ...]
```

#### `move` task between workspaces
```php
$response = $client->tasks()->move('IF0lK9JcsdaxeLkDZ0nMG', 'IF0lK9JcsdaxeLkDZ0nMG');

$task = $response->task; // Task object

$task->id; // IF0lK9JcsdaxeLkDZ0nMG
$task->name; // My Task
$task->description; // My Task Description
$task->project; // Project object

$task->toArray(); // ['id' => 'IF0lK9JcsdaxeLkDZ0nMG', ...]
```

### `Recurring Tasks` resource
#### `create` a recurring task

```php
$response = $client->recurringTasks()->create([
    'name' => 'My Task',
    'description' => 'My Task Description',
    'status' => 'Completed',
]);

$task = $response->task; // Task object

$task->id; // IF0lK9JcsdaxeLkDZ0nMG
$task->name; // My Task
```

### `Workspaces` resource

#### `list`
List workspaces

```php
$response = $client->workspaces()->list();

$response->workspaces; // array of Workspace objects

foreach ($response->workspaces as $workspace) {
    $workspace->id; // IF0lK9JcsdaxeLkDZ0nMG
    $workspace->name; // My Workspace
    $workspace->teamId; // 2f0lK9JcsdaxeLkDZ0nMG
    $workspace->statuses; // array of Status objects
    $workspace->labels; // array of Label objects
    $workspace->type; // INDIVIDUAL
}

$response->toArray(); // ['workspaces' => [...]]
```

#### `statuses`
List statuses for a workspace
```php
$response = $client->workspaces()->statuses('IF0lK9JcsdaxeLkDZ0nMG');

$response->statuses; // array of Status objects

foreach ($response->statuses as $status) {
    $status->name; // In Progress
    $status->isDefaultStatus // true
    $status->isResolvedStatus // false
}

$response->toArray(); // ['statuses' => [...]]
```

### `Users` Resource

#### `list`

Lists the currently available users. Can be limited by `teamId` or `workspaceId`.

```php
$response = $client->users()->list([
    'workspaceId' => 'IF0lK9JcsdaxeLkDZ0nMG'
]);

$response->users; // array of User objects

foreach ($response->users as $user) {
    $user->id; // LPSIBmTN2eai9uYoKtMkzWVFTUo2
    $user->name; // Adam Paterson
    $user->email; // adam@usemotion.com
}

$response->toArray(); // ['users' => [...]]
```