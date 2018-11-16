# 第10章 使用PEAR
## 10.1 介绍
## 10.2 PEAR概念  PEAR Concepts
### 10.2.1 包    Packages
每一个包都有与之相关联的信息：
- 包的名字。
- 总结、描述和主页URL。
- 一个或者多个维护人员。
- 许可证信息。
- 所有的发布号。

### 10.2.2 发布 Releases
除了包含专有的信息，每一个发布版本还包含
- 一个版本号。
- 一个文件的列表和针对每一个文件的安装指南。
- 一个发布状态（stable、beta、alpha、devel或者snapshot）。

### 10.2.3 版本号  Version Numbers
#### 版本号格式
语法：
`
Major[.minor[.patch]][dev|a|b|RC\p1[N]]
`

样本版本号

|版本字符串|主版本|副版本|补丁级别|发布状态|
|:-:|:-:|:-:|:-:|:-:|
|1|1|-|-|-|
|1b1|1|-|-|b1|
|1.0|1|0|-|-|
|1.0a1|1|0|-|a1|
|1.2.1|1|2|1|-|
|1.2.1dev|1|2|1|dev|
|2.0.0-dev|2|0|0|dev|
|1.2.1RC1|1|2|1|RC1|

样本发布状态

|附加|含义|
|:-:|:-:|
|Dev|在开发过程中；用来做实验发布|
|A|Alpha发布；任何内容都可能改变，可能会有许多bug，而且API不是最终版本|
|B|Beta发布；API是基本上稳定了，但是可能还是有一些bug|
|RC|发布候选；如果测试没有暴露任何问题，则一个RC就会被重新发布为最终版本|
|PI|补丁级别；（不是很常用）当通过后来的修正做一个“OOPS”发布时使用|

#### 比较版本号

|版本A|版本B|最新？|理由？|
|:-:|:-:|:-:|:-:|
|1.0|1.1|B|B有更大的副版本|
|2.0|1.1|A|A有更大的主版本|
|2.0.1|2.0|A|A有一个补丁级别；B没有|
|2.0b1|2.0|B|A的“beta”发布状态比没有发布状态的更“老”些|
|2.0RC1|2.0b1|A|在主和副版本号相同的情况下，“发布候选”比“beta”更新|
|1.0|1.0.0|B|这个比较是细微的，增加一个级别将使得版本更新|

#### 主版本与副版本与补丁级别的对比

#### 主版本更改

## 10.3 获取PEAR  Obtaining PEAR
### 10.3.1 通过UNIX/Linux的PHP发布包安装    Installing with UNIX/Linux PHP Distribution

## 10.4 安装包     Installing Packages
### 10.4.1 使用pear命令     Using the pear Command
#### 选项
```shell
pear [options] sub-command [sub-command options] [sub-command arguments]
```
## 10.5 配置参数    Configuration Parameters

## 10.6 PEAR命令      PEAR Commands
### 10.6.1 pear install
### 10.6.2 pear list
### 10.6.3 pear info
### 10.6.4 pear list-all
### 10.6.5 pear list-upgrades
### 10.6.6 pear upgrade
### 10.6.7 pear upgrade-all
### 10.6.8 pear uninstall
### 10.6.9 pear search
### 10.6.10 pear remote-list
### 10.6.11 pear remote-info
### 10.6.12 pear download
### 10.6.13 pear config-get
### 10.6.14 pear config-set
### 10.6.15 pear config-show
### 10.6.16 Shortcuts

## 10.7 安装程序前端  Installer Front-Ends
### 10.7.1 CLI(命令行接口)安装程序   CLI(Command Line Interface)Installer
### 10.7.2 Gtk安装程序  Gtk installer
## 10.8 总结
