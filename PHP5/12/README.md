# 第12章 创建PEAR的组件    Building PEAR Components
## 12.1 介绍  introduction
## 12.2 PEAR标准  PEAR Standards
### 12.2.1 符号命名     Symbol Naming
#### 常量
常量的名字都是大写的，前缀是（大写的）包的名字。

    PEAR_ERROR_DIE(from PEAR package)
    AUTH_EXPIRED(from Auth package, without namespaces)
    DB_DATAOBJECT_INT(from DB_DataObject package)

#### 全局变量
惯用法是$_{Package_Name}_{lowercased_variable_name}。
小写部分是用来清楚地分离包名（它要求在每一个下划线分离的元素中都有一个大写的手写字母）部分与变量名部分。

#### 函数
使用包的名字作为前缀，包的名字大小写保持不变；前缀后面的部分是首写字母为小写的studlyCaps字符。
```php
function Package_Name_functionName()
{
    print "hello world";
}
```
如果函数是“私有”的，意思是它在定义时不能用来在包外面使用，函数名前面有一个下划线作为前缀：
```php
function _Package_Name_privateFunction()
{
    print "private function";
}
```
注意这个只适用于函数，而不适用于方法。

#### 类
类的名字也可以用包的名字作为前缀，或者可以与包的名字一样。
大写和小写字母的使用规则对于包的名字和类的名字是一样的。

    class Package_Name...
    class Package_Name_OtherClass...

#### 方法
使用首字母小写驼峰法
```php
class Foo
{
    function test()...
    function anotherTest()...
    function toHTML()...
}
```

#### 成员变量
驼峰法

### 12.2.2 代码缩进 Indentation
PEAR使用四个字符的代码缩进，只使用空格（不是制表符！）。

## 12.3 发布版本制定  Release Versioning
定义第一个稳定发布包版本号的第一个规则是：
- 每个包的第一个稳定发布版本应当使用版本号1.0.0。
- 第一个稳定发布版本之前的发布版本应当使用一个0.x的版本号，而且基本上是不稳定的。

在第一个稳定发布版本以后，开始推出一些更多的规则：
- 发布包1.N应当与1.M是兼容的，其中N大于M。例如，1.3应当与1.2是兼容的。
- N.x发布可能与M.x是不兼容的，其中N大于M。例如3.0可能与2.4是不兼容的。
- 发布新特性需要提高副版本号（例如，1.2到1.3，或者1.2.5到1.3.0）。
- 补丁级别只是用在bug修复的发布（例如，1.2到1.2.1，或者1.2.0到1.2.1）。

## 12.4 CLI环境   CLI Environment
## 12.5 基本原理    Fundamentals
### 12.5.1 何时与如何包含文件    When and How to Include Files
1. 只使用include_once或者require_once。第一号规则是总是使用include_once或者require_once来包含PEAR的代码。
如果你使用require，你的脚本将有可能因为重定义错误而终止。

2. 确定类与文件名之间的相互关系。PEAR使用的是“一个类一个文件”的概念，目的是它可以轻松地从类的名字来生成需要的文件名。
用目录分隔符代替下划线，后面加上.php，然后结束。
`
类名                      文件名
PEAR                        PEAR.php
XML_Parser                  XML/Parser.php
HTML_QuickForm_textarea     HTML/QuickFrom/textarea.php
`

3. 封装包含。每一个文件应当使用包含来清楚地表示它需要的是别的包的哪一个类。

### 12.5.2 错误处理 Error Handling
## 12.6创建包  Building Packages
### 12.6.1 PEAR例子：HelloWorld
### 12.6.2 创建Tar档案文件    Building the Tarball
### 12.6.3 验证   Verification
```shell
pear package-validate HelloWorld-1.0.0.tgz
pear info HelloWorld-1.0.0.tgz
pear list HelloWorld-1.0.0.tgz
```

### 12.6.4 回归测试     Regression Tests
## 12.7 Package.xml格式   The Package.xml Format
### 12.7.1 包信息  Package Information
#### 元素：<package>
    元素名：        package
    属性：         version（强制的）
    可以出现在：      root（强制的）
#### 元素：<name>
    元素名：        name
    属性：         none
    可以出现在：      package（强制的）
                        maintainer（强制的）
    当包含在一个<package>元素中时，<name>用来确定包的名字（大小写敏感）。
    当包含在一个<maintainer>元素中时，<name>包含的是维护人员的全名。
#### 元素：<summary>
    元素名：        summary
    属性：             none
    可以出现在：      package（强制的）
    summary元素包含一个关于包的简短的描述。
#### 元素：<description>
    元素名：        description
    属性：             none
    可以出现在：      package（强制的）
    description元素包含一个包的完整描述。
#### 元素：<license>
    元素名：        license
    属性：             none
    可以出现在：      package（强制的）
    这个元素表示哪个软件许可证应用到包。如果你没有任何特殊的参考的话使用“PHP License”
#### 元素：<maintainers>
    元素名：        maintainers
    属性：         none
    可以出现在：      package（强制的）
    maintainers（复数的）元素只是一个或者更多maintainer（单数的）元素的一个封装。
    每一个maintainer元素必须包含下面的元素：user、role和name。
#### 元素：<user>
    元素名：            user
    属性：             none
    可以出现在：      maintainer（强制的）
    这是维护人员在php.net上的用户名。
#### 元素：<email>
    元素名：            email
    属性：             none
    可以出现在：      maintainer（强制的）
    这是维护人员注册的email地址。
#### 元素：<role>
    元素名：        role
    属性：             none
    可以出现在：      maintainer（强制的）
    role元素表示维护人员对于包是哪种角色。其内容是下面这些有效的角色之一：
    - lead。核心开发人员或者核心维护人员。只有核心人员可以作新版本的发布。
    - developer。一个一直做着重大贡献的开发人员，而且帮助包的改进。
    - contributor。一些偶尔对包做出重大贡献的人，而且他们是作为“贡献者”的身份记录的。
    - helper。一些偶尔做出点小贡献的人，或者一些帮助解决某问题点的人，他们都是包的维护人员想要记录的。
#### 元素：<release>
    元素名：        release
    属性：             none
    可以出现在：      package（强制的）
                        changelog（可选的）
    release元素是针对所有的发布信息元素的一个容器元素，我们很快就能看到它。
#### 元素：<changelog>
    元素名：        changelog
    属性：         none
    可以出现在：      package（可选的）
    changelog元素可以包含一个或者更多的关于一个包的历史信息发布元素。
    代表性地说，当一个新的发布包准备的时候，在主发布信息更改以前，主发布元素被复制到changelog元素里面。
    但这个是可选的，最终是由每一个包的维护人员来决定他是否想维护这么一个在包含定义文件中的更新日志，或者他想依靠PEAR的web站点来发布更新日志。
    在线的更新日志是从每一个上传的发布信息中而不是从任何更新日志的元素中生成的。
### 12.7.2 发布信息     Release Information
#### 元素：<version>
    元素名：        version
    属性：         none
    可以出现在：      release（强制的）
    这个是发布版本号。
#### 元素：<license>
    元素名：        license
    属性：         none
    可以出现在：      release（强制的）
    这个元素表示该包应用的是哪个license。如果拿不准的话，使用“PHP License”
#### 元素：<state>
    元素名：        state
    属性：         none
    可以出现在：      release（强制的）
    这个元素描述的是一个发布版本的状态；它可能会使用devel、snapshot、alpha、beta或者stable中间的某个值。
#### 元素：<date>
    元素名：        date
    属性：         none
    可以出现在：      release（强制的）
    发布的日期使用的是ISO-8601的格式：YYYY-MM-DD。
#### 元素：<notes>
    元素名：        notes
    属性：         none
    可以出现在：      release（强制的）
    发布注释。它可以进行缩进。PEAR包处理会去掉普通的缩进前缀。
#### 元素：<filelist>
    元素名：        filelist
    属性：         none
    可以出现在：      release（强制的）
    这是一个封装组成实际的文件列表的<dir>和<file>元素的封装元素。<filelist>可以包含任意个<dir>和<file>元素。
#### 元素：<dir>
    元素名：        dir
    属性：         name（强制的）
                    role（可选的）
                    baseinstalldir（可选的）
    可以出现在：      filelist or dir（都是可选的）
    <dir>元素是用来封装在一个子目录中的<file>和<dir>元素的，而且用来应用一个默认的baseinstalldir或者role到一个目录里面所有的文件中。
    name属性是强制的，而且包含的是目录的名字。如果role或者baseinstalldir属性被指定，他们被用作每一个被包含<file>的元素的默认值。
#### 元素：<file>
    元素名：        file
    属性：         name（必须的）
                    role（可选的）
                    platform（可选的）
                    md5sum（可选的）
                    install-as（可选的）
                    debug（可选的）
                    zts（可选的）
                    phpapi（可选的）
                    zendapi（可选的）
                    format（可选的）
    可以出现在       filelist or dir（都是可选的）
    file元素用来关联包与一个文件。它有许多个属性；除了name以外所有的属性都是可选的。
#### name属性
    这是文件的名字（例如“Foo.php”）。你还可以指向在一个子目录中的文件，这种情况下文件名中的目录部分也会被包含在install路径中。
#### role属性
    这个属性描述文件的类型，或者文件拥有的角色是什么。role是可选的，而且默认是PHP。可能的值包括
    php。PHP源文件。
    ext。二进制的PHP扩展，共享库/DLL。
    src。C/C++的源文件。
    test。回归测试文件。
    doc。文档文件。
    Data。数据文件；基本来说就是不符合任何其他角色的内容。
    script。可执行的脚本文件。
#### platform属性
    如果platform属性被设置的话，文件将会在特定的平台上安装。
#### md5sum属性
    这是该文件MD5的校验码。
#### install-as属性
#### debug和zts属性
    debug和zts属性只是为角色属性设为ext的文件而设置；PHP扩展文件。
    两个属性都包含yes或者no的值，表示扩展的二进制文件创建时是否分别带有调式或者线程安全。
#### phpapi和zendapi属性
    与debug和zts一样，phpapi和zendapi属性也只设置role=ext的文件。
    它们描述在创建扩展二进制文件时使用的是哪个版本的PHP和Zend APIs。
    PHP是不会加载在其他API版本上创建的扩展的。
#### format属性
    format属性用在role=doc的文件。它表示文档使用的是哪种格式。
#### 元素：<provides>
    元素名：        provides
    属性：             name（必需的）
                        type（必需的）
    可以出现在：      release（可选的）
    provides元素描述包提供的定义或者特性。
#### name属性
    这是描述的实体的名字，在type定义中被表示为N。
#### type属性
    type属性的值可以为下面的值之一：
    - ext。包提供扩展N。
    - prog。包提供程序N。
    - class。包提供类N。
    - function。包提供函数N。
    - feature。包提供特性N。
    - api。包提供N个接口/API。
    feature是一个抽象类型，它让你设置“这个包提供一个操作N种特性的方法”。
## 12.8 从属关系    Dependencies
### 12.8.1 元素：<deps>
    元素名：        deps
    属性：         none
    可以出现在：      release（可选的）
    这个元素是一个用来包含<dep>元素的容器。
### 12.8.2 元素：<dep>
    元素名：        dep
    属性：             name（必需的）
                    type（必需的）
                    rel（可选的）
    可以出现在：      deps（必需的）
    dep元素描述一个单独的从属关系。
#### name属性
    这是从属关系的对象。对于pkg从属关系，name属性包含包的名字；对于ext从属关系，它包含的是扩展名，等等。
#### type属性
    有效的从属关系类型有
    - php。PHP版本从属关系；name被忽略。
    - ext。扩展从属关系（扩展必须安装）。
    - pkg。PEAR包的从属关系。
    - prog。外部程序的从属关系；name是指程序的名字（没有后缀）。
    - ldlib。创建时库的从属关系；name是指程序的名字（没有后缀）。
    - rtlib。实时的库从属关系。
    - os。操作系统从属关系。
    - websrv。web服务器从属关系。
    - sapi。SAPI向后从属关系。
#### rel属性
    rel是relation的缩写，而且它表示是否及如何比较version属性。可能出现的值包括
    - has。默认情况下。没有版本的比较；目标只需要被安装/存在/为真。
    - lt。安装的版本必须低于设置的。
    - le。安装的版本必须低于或者等于设置的。
    - gt。安装的版本必须高于设置的。
    - ge。安装的版本必须高于或者等于设置的。
    - eq。安装的版本必须等于设置的。
    - ne。安装的版本必须与设置的不同。
#### optional属性
    这个属性让你设置一个从属关系，对于包的安装来说不是强制需要的，但是表示一些可以提供更高级的功能的内容。
    你可以不设置它，或者给它yes或者no的值。
### 12.8.3 从属关系类型   Dependency Types
#### PHP从属关系
    表示包需要的PHP的版本。
#### 扩展从属关系
    表示包需要一个特定的PHP扩展。
#### PEAR包从属关系
    表示这个包需要另外一个包。
#### 外部程序从属关系
    当一个PEAR包依靠在一个不属于PHP或者PEAR的外部的程序时，这个表现为一个外部程序的从属关系。
#### 操作系统从属关系
### 12.8.4 避免从属关系的原因    Reasons to Avoid Dependencies
### 12.8.5 可选的从属关系  Optional Dependencies
### 12.8.6 一些例子     Some Examples
## 12.9 字符串替换   Sting Substitutions
### 12.9.1 元素：<replace>
    元素名：        replace
    属性：         from（必需的）
                    to（必需的）
                    type（必需的）
    可以出现在：  file（可选的）replace元素指定一个置换，为了在安装过程中包含文件而执行。
    文件中所有from属性出现的地方将被一个通过to和type属性表示的字符串替代。
    type属性可以使用下面的值之一：
    - php-const。from被to命名的PHP常量的值替代。
    - pear-config。from通过to命名的PEAR配置参数替代。
    package-info。from被来自包配置的to的域替代。
### 12.9.2 包含C代码    Including C Code
## 12.10 包含C代码
#### 12.10.1 元素：<configureoptions>
    元素名：        configureoptions
    属性：         none
    可以出现在：      release（可选的）
    这是一个针对一个或者更多的<configureopiton>元素的一个封装元素。
#### 12.10.2 元素：<configureoption>
    元素名：        configureoption
    属性：         name（必需的）
                    default（可选的）
                    prompt（必需的）
    可以出现在：      configureoptions（必需的）
    这个元素是当创建扩展二进制文件时，用来在UNIX上收集创建参数的。
    代表性地，每一个扩展都有一个或者更多的编译选项可以在这个指定。
#### name属性
    configureoption的name属性对应于编译选项的名字，前面不加任何东西。
#### default属性
    当-name选项没有带有一个参数时，这个属性只是用来作为默认行为的一个简短的描述。
#### prompt属性
这个属性包含一个在安装的时候显示的提示符。
## 12.11 发布包    Releasing Packages

## 12.12 PEAR发布程序   The PEAR Releasing Process
1. 建议一个包。
2. 等待投票结果。
3. 创建一个包。
4. 打包一个tar档案文件。
5. 测试/解答问题。
6. 上传发布版本。
## 12.13 打包     Packaging
### 12.13.1 源码分析    Source Analysis
### 12.13.2 MD5校验码生成    MD5 Checksum Generation
### 12.13.3 Package.xml更新
### 12.13.4 创建tar档案文件   Tarball Creation
## 12.14 上传 Uploading
### 12.14.1 上传发布版   Upload Release
### 12.14.2 完成  Finished
## 12.15 总结