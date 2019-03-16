# php-driv-mua

[![php7](https://img.shields.io/badge/php-7-green.svg)](https://php.net)
[![composer](https://img.shields.io/badge/composer-suggest-blue.svg)](https://getcomposer.org)
[![build](https://img.shields.io/badge/build-pass-purple.svg)]()  
A php framework for application or business system assembing instantly

## usage

Download [`LTS release` ]() OR git clone lts version branch.  

```bash
git clone -b 0.8.0 git@github.com:LeanderChen/php-driv-mua.git
```

Initialize application configure with `mua-cli`, or just add and write `app/base/conf/mua.php`, `app/base/conf/database.php`.  

```bash
cd php-driv-mua
chmod +x mua-cli
php mua-cli create site -n 'my mua site' -c '{database:"mua", username:"mua-app", password:"mua-pwd", domain:"demo.muaphp.com"}' -l silent
```

That's all, but start of your `creative work`.  
Feel good? Maybe you can refer [`manual#start_creative`]() for more infomation.  

## TOC  

1. what different  

`mua` is here for powerful and Modularized web project.  

- `friendly` for community framework and components. ([here]() for more)  
- `normal` for php ecosystem & web architecture. ([here]() for more)  

2. easy for you

3. parts of project  

- `mua`  
- `mua core`  
- `Mua4Composer`  
- `Mua4Docker`

4. ecosystem  
  4.1 official tools  
  4.2 third-party tools  

## community  

- web framework  
thanks to community framework: [`Yii`]()、[`ThinkPHP`]()、[`CodeIgniter`]()、[`laravel`]()、[`ZendFramework`]() .etc  

- web components  
thanks to powerful web components: [`workman`]()、[`swoole`]()    

- container service  
support `docker`  

## maintainer  

- [`leander`](https://github.com/leanderchen)  

## license  

based on `Apache 2.0` license, free to download, distribute and commercial.