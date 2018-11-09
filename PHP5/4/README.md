# 第4章 PHP5高级面向对象编程和设计模式
## 4.1 介绍
## 4.2 重载性能
### 4.2.1 属性和方法的重载
PHP允许通过实现特殊的代理方法对属性的访问和方法的调用进行重载，这些代理方法将在相关的属性或者方法不存在是调用。

## 4.3 迭代器 Iterator
一个对象的属性可以用foreach()循环进行迭代遍历：
```php
class MyClass
{
    public $name = "John";
    public $sex = "male";
}
$obj = new MyClass();
foreach ($obj as $k => $v) {
    echo $obj[$k] , ' = ', $v, PHP_EOL;
}
```
php7中运行报错

## 4.4 设计模式 Design Patterns
### 4.4.1 策略模式 Strategy Pattern

### 4.4.2 单件模式 Singleton Pattern

### 4.4.3 工厂模式 Factory Pattern

### 4.4.4 观察者模式 Observer Pattern

## 4.5 映射 Reflection
### 4.5.1 介绍
### 4.5.2 映射API     Reflection API
### 4.5.3 映射举例
### 4.5.4 使用映射执行授权模式
## 4.6 总结