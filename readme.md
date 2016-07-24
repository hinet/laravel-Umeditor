#Umeditor for laravel 5

####百度前端团队对于百度编辑器处理停止维护状态，最后一个版本更新日期为 2014.3 ，请慎重选择。

`Umeditor for laravel ` 对于国内最好用的富文本web编辑器[umeditor](http://ueditor.baidu.com/website/umeditor.html)的封装，方便使用 `laravel` 的朋友能够快速配置和使用，以及在线更新编辑器。

##特点
1. 方便配置
2. 随时更新
3. 使用[composer](https://getcomposer.org/)进行安装管理，国际标准，方便快捷

##Install && Use

这里不详细介绍如何安装composer了，大家根据[链接](https://getcomposer.org/)自行安装吧！

命令行下直接 `composer require hinet/laravel-umeditor` ，版本的话无特殊需求则选择 `~1.0`，当前使用的Umeditor版本为1.2.2

####Config
1.在 `app/config/app.php` 的 `providers` 数组中添加
```php
'Hinet\Umeditor\UmeditorServiceProvider',
```
`aliases` 数组中添加
```php
'Umeditor'        => 'Hinet\Umeditor\Umeditor',
```
**同时确保 `url` 的值为web的地址, 同时别忘了`composer dumpautoload`**

2.命令行下执行如下命令
```shell
php artisan config:publish hinet/umeditor
```
和
```shell
php artisan asset:publish hinet/umeditor
```

3.配置文件的修改:
```php
// app/config/packages/umeditor/config.php
<?php
use Illuminate\Support\Facades\Config;

$url = Config::get('app.url').'/packages/umeditor/';

return [

    // 图片上传配置
    'upload' => [
        // 上传图片路径
        'savePath' => 'upload/',
        // 上传文件大小
        'maxSize' => 1000,
        // 上传文件类型
        'allowFiles' => [".gif" , ".png" , ".jpg" , ".jpeg" , ".bmp"],
    ],

    // 编辑器配置
    'editor' => [
        // umeditor 根路径
        'UMEDITOR_HOME_URL' => $url,

        // 图片上传编辑器配置
        'imageUrl' => 'umeditor/imageUp',
        'imagePath' => '',
        'imageFieldName' => 'upfile',

        //工具栏上的所有的功能按钮和下拉框，可以在new编辑器的实例时选择自己需要的从新定义
        'toolbar' => [
            'source | undo redo | bold italic underline strikethrough | superscript subscript | forecolor backcolor | removeformat |',
            'insertorderedlist insertunorderedlist | selectall cleardoc paragraph | fontfamily fontsize' ,
            '| justifyleft justifycenter justifyright justifyjustify |',
            'link unlink | emotion image video  | map',
            '| horizontal print preview fullscreen', 'drafts', 'formula'
        ],

       // ...
    ],
];
```

4.终于配置完成了

###Use

1.这里封装了以下方法可以方便大家添加编辑器的css和js，以及编辑器，直接在 `blade` 的模版中使用
```php
// 添加css样式
{{ Umeditor::css() }}
```

```php
// 添加编辑器样式
// 该方法有两个参数，
// 第一个为显示的编辑器内容【可选】
// 第二个为编辑器的attribute数组，可以控制编辑器的id,style,class等内容【可选】，默认id为myEditor
// example: Umeditor::content('', ['id'=>'textid', 'class'=>'text-umeditor'])
// 得到 <script type='text/plain'  id='textid' class='text-umeditor'></script>
{{ Umeditor::content() }}
```

```php
// 添加js
{{ Umeditor::js() }}
```

2.文件的上传位置为 `public/upload` 文件夹下，请确保有写入权限

3.好嘞，终于大功告成，你可以参考[这里](http://ueditor.baidu.com/website/umeditor.html)来使用编辑器的一些方法了。

##Bug
如果你遇到了问题，可以先尝试 `composer update` 来更新一下。如果问题依旧，请提交[issue](https://github.com/zhuzhichao/Umeditor/issues)，我会及时回复。当然如果你能提交[Pull Requests](https://github.com/zhuzhichao/Umeditor/pulls)更好，^^

##Contributing
有什么新的想法和建议，欢迎提交[issue](https://github.com/zhuzhichao/Umeditor/issues)或者[Pull Requests](https://github.com/zhuzhichao/Umeditor/pulls)。

##License
MIT
