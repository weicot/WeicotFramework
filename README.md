# WeicotFramework
Weicot Test And  Mvc More Framework
关于框架：是我在 2015 年 5月写的 
          用来熟悉 php 框架及加载流程
框架特点：代码的高可移植性 因为我有许多项目都用这个做测试的
          比如magento zencart wordpress 的		  
关于作者：ajian-tuzi  一个从很小就开始接触编程的人
作者博客：http://www.weicot.com
交流方式：QQ 1050653098
		 weicots@gmail.com  or ajiang-tuzi@outlook.com
          

WeicotFramework 的目录结构

├─app 应用目录
│  ├─code  代码
│  │  ├─Acma 记账应用
│  │  │  ├─Block      视图块  关于视图的和块缓存 
│  │  │  ├─Controller 控制器  路由及分发 调用 不可重复利用代码 集合
│  │  │  ├─DB         数据库  所有数据库操作集合
│  │  │  └─Model      模型集合   业物逻辑
│  │  ├─Base 基础
│  │  │  ├─Block
│  │  │  ├─Controller
│  │  │  ├─DB
│  │  │  └─Model
│  │  ├─Bill 订单管理应用
│  │  │  ├─Block
│  │  │  ├─Controller
│  │  │  ├─DB
│  │  │  └─Model
│  │  ├─Csv csv 处理应用
│  │  │  ├─Block
│  │  │  ├─Controller
│  │  │  ├─DB
│  │  │  └─Model
│  │  ├─Doc doc 处理应用
│  │  │  ├─Block
│  │  │  ├─Controller
│  │  │  ├─DB
│  │  │  └─Model
│  │  ├─Http 。。。
│  │  │  ├─Block   
│  │  │  ├─Controller
│  │  │  ├─DB
│  │  │  └─Model
│  │  ├─Mail 。。。
│  │  │  ├─Block
│  │  │  ├─Controller
│  │  │  ├─DB
│  │  │  └─Model
│  │  └─Test 。。。。
│  │      ├─block
│  │      ├─controller
│  │      ├─db
│  │      └─model
│  └─etc 配置文件
├─lib 依赖库
│  └─Core  核心加载文件
├─media  媒体
├─NOTE 笔记
├─skin  样式及图片
│  ├─css
│  ├─img
│  └─js
├─test
│  └─note
├─tmp
└─tools  工具箱
    └─lib
        ├─canadapostapi
        │  ├─docs
        │  │  └─tracking
        │  ├─SOAP
        │  │  ├─tracking
        │  │  │  ├─GetDeliveryConfirmationCertificate
        │  │  │  ├─GetSignatureImage
        │  │  │  ├─GetTrackingDetails
        │  │  │  └─GetTrackingSummary
        │  │  └─wsdl
        │  └─third-party
        │      └─cert
        └─postmaster-php-master
            ├─lib
            │  └─Postmaster
            └─tests
                └─Postmaster
