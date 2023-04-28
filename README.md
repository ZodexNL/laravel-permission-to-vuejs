# Laravel permission to Vuejs

## Inertia & Vue3

This package is a fork of the package (ahmedsaoud31/laravel-permission-to-vuejs) and requires the [spatie-permission](https://github.com/spatie/laravel-permission) package.

The reason I made this fork is because in my projects i had to force reload my browser in order to see role and/or permission changes.
You need to use Inertia & Vue3 in order for this package to work.

## Installation

```json
composer require zodexnl/spatie-permission-to-vue-inertia
```

## Config
First, add the following trait to your `User` model:


```php
use SpatiePermissionsToVueInertia\Traits\SpatiePermissionsToVue;

class User extends Authenticatable
{
    use SpatiePermissionsToVue;
    
}
```

Secondly, you want to add the `spatie-permission-to-vuejs` plugin in `app.js` file:
```js
import LaravelPermissionToVueJS from "../../vendor/zodexnl/spatie-permission-to-vue-inertia/src/js;
import Vue from 'vue';

Vue.use(plugin);
Vue.use(LaravelPermissionToVueJS);
```

Last, you want to add the the follwing to HandleInertiaRequest.php:

```php
public function share(Request $request)
{
    return array_merge(parent::share($request), [
        'permissions' => json_decode(auth()->check() ? auth()->user()->jsPermissions() : '{}', true),
    ]);
}
```

## How to use

You can use the following code in your project:

```html
<div v-if="can('Permission name')">
  <!-- Code -->
</div>

<div v-if="is('roleName')">
  <!-- Code -->
</div>
```

## License

The MIT License (MIT).
