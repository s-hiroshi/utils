# s-hiroshi/utils

Symfony Consoleで作成したユーティリティ。


## Build

```shell
$ cd /path/to/project
$ php -d phar.readonly=0 ./bin/box.phar build
```


## 使用例


### sh:utils:text2json


````shell
$ php console.php sh:utils:text2json <ファイルパス> 
````

引数に指定するファイルの内容。

```txt
"澤井寛\n山田太郎",
"さわいひろし\nやまだたろう",
"サワイヒロシ\nヤマダタロウ",
```

Unicode文字へ変換します。

```shell
"\u6fa4\u4e95\u5bdb\n\u5c71\u7530\u592a\u90ce",
"\u3055\u308f\u3044\u3072\u308d\u3057\n\u3084\u307e\u3060\u305f\u308d\u3046",
"\u30b5\u30ef\u30a4\u30d2\u30ed\u30b7\n\u30e4\u30de\u30c0\u30bf\u30ed\u30a6",
```
