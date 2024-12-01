<?php
/**
 * MathJaxPreview插件for Typecho, 在后台的文章编辑界面加载MathJax实时预览数学公式
 *
 * @package MathJaxPreview
 * @version 1.0.0
 * @author HsukqiLee
 * @date 2024-11-30
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

class MathJaxPreview_Plugin implements Typecho_Plugin_Interface
{
    public static function activate()
    {
        Typecho_Plugin::factory('admin/write-post.php')->bottom = array('MathJaxPreview_Plugin', 'render');
    }

    public static function deactivate() {}

    public static function config(Typecho_Widget_Helper_Form $form)
    {
        $extensions = new Typecho_Widget_Helper_Form_Element_Text(
            'extensions', 
            NULL, 
            'mhchem.js,autoload-all.js', 
            _t('MathJax插件列表'), 
            _t('请输入MathJax插件列表，逗号分隔')
        );
        $form->addInput($extensions);
    }

    public static function personalConfig(Typecho_Widget_Helper_Form $form) {}

    public static function render()
    {
        $options = Helper::options();
        $extensions = $options->plugin('MathJaxPreview')->extensions;
        $extensionsArray = explode(',', $extensions);
        $extensionsJson = json_encode($extensionsArray);

        $jsUrl = 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML';
        echo '<script src="' . $jsUrl . '"></script>';
        echo '<script>
            MathJax.Hub.Config({
                TeX: { extensions: ' . $extensionsJson . ' },
                showProcessingMessages: false,
                messageStyle: "none"
            });
        </script>';
        echo '<script src="' . Helper::options()->pluginUrl . '/MathJaxPreview/static/script.js?v=1"></script>';
    }
}
?>
