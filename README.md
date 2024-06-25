# Aisha - <small>Medical Assistant powred by AI</smalll>

## Built using [Laravel Framework](https://laravel.com)

**how to install ?**

to install the project and start using it, you will follow these steps

1. install the project from github using cmd

```batch
git clone https://github.com/karimaouaouda/aisha.git --depth=1
```

2. now, you need to install packages and dependencies
   to do that yoou must install js packages and php packages just execute that threecommands :
```batch
cd aisha #navigate to project folder
``` 

```batch
composer install
```
```batch
npm install
```

3. after that you must configure the app url and livewire assets urls , because livewire send requests **get method** to get livewire js file and **post method** to handle the actions, we make it paunless to configure all that, you just will navigate to file : `.env` in root folder , there you will find all environement variable you need to configure
4. you will update two variables `APP_URL` and `VITE_APP_URL` generally they will hold the same value, for example if your project hosted in : `https://example.com` your values will be :

```ini
APP_URL=https://example.com
VITE_APP_URL="${APP_URL}" #or https://example.com
```

if the project will hosted in `https://example.com/aisha/public` the values will be :

```ini
APP_URL=https://example.com/aisha/public
VITE_APP_URL="${APP_URL}" #or https://example.com/aisha/public
```
4. now let's configure livewire, navigate to file : `config/livewire.php` you will find two keys, `script_route` and `update_route`, you will findd comments that explain each one, you will set them to :

```php
return [
    //...

    'script_route' => 'livewire/livewire.js', //or aisha/public/livewire/livewire.js
    'update_route' => 'livewire/update', //or aisha/public/livewire/update

    //....
]
```
5. then you will just run
```sh
npm run build
```
that command will build the assets, and that's it :)
