# Information

Добавление иконок шрифта **Font Awesome** в статью. Данное расширение не добавляет сам шрифт, оно лишь позволяет использовать иконки из шрифта.

- `name` - название иконки;
- `size` - размер иконки в единице измерения "em";
- `color` - цвет иконки (название цвета / HEX-код цвета);
- `options` - дополнительные опции иконки (fa-spin / fa-fw / и т.д.).

## Install

1. Загрузите папки и файлы в директорию `extensions/MW_EXT_Icon`.
2. В самый низ файла `LocalSettings.php` добавьте строку:

```php
wfLoadExtension( 'MW_EXT_Icon' );
```

## Syntax

```html
{{#icon: name=[NAME]|size=[SIZE]|color=[COLOR]|options=[OPTIONS]}}
```
