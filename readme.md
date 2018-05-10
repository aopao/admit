#
## 安装

### 安装 larave-ide-helper
    
```
# 如果只想在开发环境安装请加上 --dev
composer require barryvdh/laravel-ide-helper
# 如果只想在开发环境安装请加上 --dev 安装 doctrine/dbal 「请装上它，在为模型注释字段的时候必须用到它」
composer require "doctrine/dbal: ~2.3"
在 「config/app.php」的 「providers」数组中加入
Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class
```