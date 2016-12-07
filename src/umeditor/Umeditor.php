<?php namespace Hinet\Umeditor;

/**
 * 提供umedior前端使用的方法
 *
 * Class Umeditor
 * @package Zhuzhichao\Umeditor
 */
class Umeditor {

    /**
     * 编辑器DOM
     * @param string $content
     * @param array  $config
     */
    public static function content($content='', $config=[]) {
        $attr = Umeditor::makeConfig2String($config);
        echo "<script type='text/plain' {$attr}>{$content}</script>";
    }

    /**
     * 生成编辑器的参数
     * @param $config
     *
     * @return string
     */
    private static function makeConfig2String($config) {
        $string = '';
        if(is_array($config)) {
            if($config===[]) {
                $string = "id='myEditor'";
            }
            foreach($config as $k=>$v) {
                $string .= " {$k}='{$v}'";
            }
        } else {
            $string = "id='{$config}'";
        }

        return $string;
    }

    /**
     *	编辑器的CSS资源
     */
    public static function css() {
        echo '<link href="'. asset('packages/umeditor/themes/default/css/umeditor.css') .'" type="text/css" rel="stylesheet">';
    }

    /**
     *	编辑器的JS资源
     */
    public static function js() {
        echo '<script type="text/javascript" charset="utf-8" src="'.route('umeditor.config').'"></script>';
        echo '<script type="text/javascript" charset="utf-8" src="'.asset('packages/zhuzhichao/umeditor.min.js').'"></script>
            <script type="text/javascript" src="'.asset('packages/umeditor/lang/zh-cn/zh-cn.js').'"></script>';
    }
}