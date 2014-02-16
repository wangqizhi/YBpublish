YBpublish
====================


Config_files:
--------------

DB_config:
--------------
application/config/database.php


Login_Api:
--------------
application/libraries/Ybauth.php  --#57


Linux_config
--------------
modify /etc/sudoers
--------------
1. www     ALL=(root)      NOPASSWD:/bin/mkdir
2. www     ALL=(root)      NOPASSWD:/bin/cp
3. www     ALL=(root)      NOPASSWD:/bin/echo
4. www     ALL=(root)      NOPASSWD:/usr/bin/tee


Mkdir
--------------
/work_dir


chmod 777
--------------
application/logs
application/cache
