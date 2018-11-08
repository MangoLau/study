# 第3章 PHP5面向对象语言
## 3.1 介绍
## 3.2 对象
## 3.3 声明一个类
## 3.4 new关键字和结构函数
## 3.5 析构函数
## 3.6 使用$this变量访问方法和属性
### 3.6.1 public、protected和private属性
- public。公共成员既可以通过对象外部使用$obj->publicMember访问，也可以使用特殊变量$this（例如，$this->publicMember）从内部访问。
如果另外一个类继承类这个公共变量，这个规则同样适用，而且从这个类的对象的外部和内部的方法都可以访问。

- protected。保护成员只能从对象内部的方法访问-例如，$this->protectedMember。
如果另外一个类继承一个保护的成员，同样的规则也适用，而且它可以从继承类实例化的对象的方法中通过特殊的$this变量访问到。

- private。与私有成员与保护成员类似，因为它们都只能从对象内部的方法访问。
但是，私有成员不能从继承类实例化的对象的方法访问。
因为私有属性在继承的类中是看不到的，而且两个相关的类可以分别声明一个名字相同的私有变量。
也就是两个类都只能看到自己的私有属性，私有成员之间是没有关系的。

### 3.6.2 public、protected和private方法
- public方法可以在任何作用域访问到。

- protected方法只能从类或者继承类的一个成员中访问到。

- private方法只能从类的一个成员中访问到，而且无法从继承类的成员中访问到。
就跟属性一样，private方法可以在继承类中重新定义。
每一个类只能看到它自己定义的私有方法。

### 3.6.3 静态属性

### 3.6.4 静态方法

## 3.7 类的常量
常量的值是不变的，一旦定义后不能被改变也不能被注销。
用常量的原因是你不想应用中其他情况下别人可以改变它们。
**注意：对于全局的常量来说，最好用大写字母来编写常量的名字，因为这是一个习惯用法。**

## 3.8 克隆对象

## 3.9 多态

## 3.10 parent::和self::

## 3.11 instanceof运算符

## 3.12 Abstract方法和类

## 3.13 接口
**注意：接口总是被认为是public的；因此，你不能在定义接口时，给接口的函数原型设置访问修饰符。**
**注意：你不能实现互相冲突的多重接口（例如，接口如果定义相同的常量和方法）。**

## 3.14 接口的继承
接口时可以从别的接口继承来的。继承接口的语法与继承类的语法类似，但是接口允许多重继承：
```php
interface I1 extends I2, I3//...
{
//...
}
```
与类实现接口类似，一个接口只能继承与自己互相不冲突的接口（也就是说如果I2定义了在I1已经定义的方法或者常量，你将收到报错信息）。

## 3.15 final方法
不允许继承类改写此方法
```php
class MyBaseClass
{
protected $id = 0;
final function idGeneratior()//不允许继承类重写此方法
{
    return $this->>id++
}
//...
}

```

## 3.16 final类
不允许其他类继承此类
```php
final class MyBaseClass
{
//...
}
```

## 3.17 __toString()方法

## 3.18 异常处理

## 3.19 __autoload()

## 3.20 在函数参数中提示类的类别
```php
function onlyWantMyClassObjects($obj)
{
    if (!($obj instalce of MyClass)) {
        die("Only objects of type MyClass can be sent to this function");
    }
    //...
}

//改进
function onlyWantMyClassObjects (MyClass $obj)
{
//...
}
```

## 3.21 总结