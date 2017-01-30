# Marmiton
Projet Ecole : refaire marmiton 

-------------------------------
PREMIERE ETAPE :
-------------------------------

1 - Rajouter le site dans le host :
sudo vi /etc/hosts ==> dedan on rajoute : 127.0.0.1 marmiton.local

2 - Crée un virtualhost :

chemain et command pour le crée ==> sudo vi /private/etc/apache2/other/marmiton.conf OU rajouter directement dans le  : /etc/apache2/extra/httpd-vhosts.conf mais avant il faut faire un backUp du fichier de config : sudo cp httpd-vhosts.conf httpd-vhosts.conf.bak

3 - Le contenu du fichier :
    
-------------------------------------------------------------------
<VirtualHost *:80>
  ServerName    marmiton.local
  DocumentRoot /Users/zkherfi/Sites/EtnaSchool/marmiton
  DirectoryIndex index.php
  ErrorLog "/private/var/log/apache2/marmiton-error_log"
  CustomLog "/private/var/log/apache2/marmiton-access_log" common
  <Directory /Users/zkherfi/Sites/EtnaSchool/marmiton>
    AllowOverride All
    Allow from All
  </Directory>
  <Directory>
    AllowOverride All
    Allow from All
  </Directory>
</VirtualHost>
---------------------------------------------------------------------

4 - Après faire ça il faut Restart Apache avec la command : sudo apachectl restart

Pour Accedez a la page d'accueil l'url : http://marmiton.local/accueil/index
Pour Accedez a la page Recette l'url : http://marmiton.local/recette/index
                                            /host       /Controller/ Action


