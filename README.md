# APIHelper PHP

## Use

### Simple Request

```php
$result = APIHelper::request($url, 'GET');

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
APIHelper::request($url, 'POST', array('key'=>'value'));
```

### Headers

```php
APIHelper::request($url, 'GET', null, array('Content-Type'=>'text/html');
```
