# MathJaxPreview

MathJaxPreview 是一个为 Typecho 设计的插件，用于在后台的文章编辑界面加载 MathJax 并实时预览数学公式。

## 功能

- 在文章编辑界面加载 MathJax
- 支持自定义 MathJax 插件列表
- 实时预览数学公式
- 优化渲染性能，避免频繁渲染

## 安装

1. 下载插件并解压到 Typecho 的插件目录 `usr/plugins/MathJaxPreview`。
2. 登录 Typecho 后台，进入插件管理页面，激活 `MathJaxPreview` 插件。
3. 进入插件配置页面，设置 MathJax 插件列表（逗号分隔）。

## 配置

在插件配置页面中，可以设置 MathJax 插件列表，格式如下：

```
mhchem.js,autoload-all.js
```


## 使用

插件激活后，将在文章编辑界面自动加载 MathJax，并在输入内容时实时渲染数学公式。渲染范围限定在预览框 `div#wmd-preview` 内。

## 注意事项

- 只有当预览框显示时才会重新渲染 MathJax；
- 为了优化性能，输入内容后会延迟 500 毫秒再进行渲染。
