���������� ��������
============================
���������� ����������
------------

Apache 2.�<br>
PHP 5.4<br>
Mysql 5.�<br>
GIT<br>
Composer


���������
------------

1. ������� ����� ��� �������, �������� ```tasks```
2. � ��������� ������ ��������� ��������� ������� ��� �������� ���������� �����������
```[���� � ����� tasks] git init```
3. �����, � ���� �� ���������� ��������� �������<br> 
```git remote add origin https://github.com/Koha2014/task_manager.git```
4. �����, ����������� ����� ������� 
```git pull origin master```
5. ����� ����, ��� ����� ��������������� ����� ������������� ����� ���� yii framework, ��� ����� ���������� composer. 
� ������� ���-�������, ������� ���������� ������� � �������� ��������� ������� 
```composer update```
6. ����� �������� ������ ���� yii, ���������� ������� ���� ������ � ��������� ```tasks_db```. 
��� ������������� �������� ��������� ����������� � �� � ����� config/db.php
��������� �� ���������:
 ```
 'class' => 'yii\db\Connection',<br>
    'dsn' => 'mysql:host=localhost;dbname=tasks_db',<br>
    'username' => 'root',<br>
    'password' => '',<br>
    'charset' => 'utf8',
	```
7. ����� ��������� � �������� �� ���������� ��������� �������� ��� ��������� ������ ��.
��� ����� � ��������� ������ ����������(� ���������� �������) ��������� ������� 
```yii migrate```
8. ������ ����� ������� ������. ���� ��� �������� �������� �������� ������, ����������� ��������� ��������� ����������� � ���� ������. ���� � �������� ���-������� ������������ �� 
apache, ������� ����� .htaccess �� �������� ���������� � ���������� /web, ��������� �� ��������� ������ �� ������ � ������ .htaccess.
9. ����� ����� � ������ ���������� �������� ����������� ����� - admin, ������ - admin/


