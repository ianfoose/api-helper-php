# Relaxful

A PHP API client.

## Use

### Simple Request

```php
$result = Relaxful::request($url, 'GET');

if(empty($result['error'])) {
  if($result['status'] == 200) {
    print($result['response'];
  } else {
    // todo error handling
  }
} else {
  // todo error handling
}
```

### POST Request

```php
Relaxful::request($url, 'POST', array('key'=>'value'));
```

### Headers

```php
Relaxful::request($url, 'GET', null, array('Content-Type'=>'text/html');
```
